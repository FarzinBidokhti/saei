<?php

namespace App\Livewire;

use App\Models\Defect;
use Livewire\Component;
use App\Models\Process;
use App\Models\Section;
use App\Models\SubDefect;
use App\Models\DefectRequest;
use Illuminate\Support\Facades\Auth;

class ApproveRequestModal extends Component
{
    public $requestId;
    public $description;
    public $defectRequest;
    public $sections            = [];
    public $processes           = [];
    public $section_id          = null;
    public $process_id          = null;
    public $reason_text         = '';
    public $show                = false;
    public $manual_mode         = false;
    public $is_sensor           = null;
    public $manual_process_name = '';

    protected $listeners = ['openApproveModal' => 'loadRequest'];

    public function loadRequest($requestId)
    {
        $this->requestId     = $requestId;
        $user                = auth()->user();
        $departmentIds       = $user->departments()->pluck('departments.id')->toArray();
        $this->sections      = Section::whereIn('department_id', $departmentIds)->get();
        $this->reason_text   =  DefectRequest::query()
            ->where('id', $this->requestId)
            ->value('reason_text');

        $this->updatedSectionId($this->section_id);

        $this->show = true;
        $this->dispatch('show-bootstrap-modal');
    }

    public function updatedSectionId($value)
    {
        if (!empty($value)) {
            $this->processes = Process::where('section_id', $value)
                ->selectRaw('MIN(id) as id, equipment')
                ->groupBy('equipment')
                ->orderBy('equipment')
                ->get();
        } else {
            $this->processes = [];
        }
    }

    public function save()
    {
        $rules = [
            'section_id'  => 'required',
            'reason_text' => 'required',
        ];

        if (!$this->manual_mode) {
            $rules['process_id'] = 'required';
        } else {
            $rules['manual_process_name'] = 'required';
        }

        $this->validate($rules, [
            'section_id.required'          => 'لطفا قسمت را انتخاب نمایید.',
            'process_id.required'          => 'لطفا تجهیز را انتخاب نمایید.',
            'manual_process_name.required' => 'لطفا نام تجهیز را وارد نمایید.',
            'reason_text.required'         => 'لطفا متن علت را وارد نمایید.',
        ]);

        $request = DefectRequest::findOrFail($this->requestId);

        if ($this->manual_mode) {
            $process = Process::create([
                'sub_defect_id' => $request->sub_defect_id,
                'equipment'     => $this->manual_process_name,
                'reason'        => $this->reason_text,
                'section_id'    => $this->section_id,
                'is_sensor'     => $this->is_sensor
            ]);

            $this->process_id = $process->id;
        }

        $request->update([
            'section_id'  => $this->section_id,
            'process_id'  => $this->process_id,
            'reason_text' => $this->reason_text,
            'approved_by' => auth()->id(),
        ]);

        $this->dispatch('swal-success');
        $this->dispatch('hide-bootstrap-modal');
        $this->dispatch('pg:eventRefresh-defectrequests');
        $this->show = false;
    }

    public function toggleManualMode()
    {
        $this->manual_mode = !$this->manual_mode;
        if ($this->manual_mode) {
            $this->process_id = null;
        } else {
            $this->manual_process_name = '';
        }
    }

    public function render()
    {
        return view('livewire.approve-request-modal');
    }
}
