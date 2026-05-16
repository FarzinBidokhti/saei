<?php

namespace App\Livewire;

use App\Models\Defect;
use Livewire\Component;
use App\Models\Process;
use App\Models\Section;
use App\Models\SubDefect;
use App\Models\Department;
use App\Models\DefectRequest;

class DefectSearch extends Component
{
    public $defect_code;
    public $department_id;
    public $departments    = [];
    public $defect         = null;
    public $subDefect      = null;
    public $processes      = null;
    public $sectionIds     = null;
    public $errorMessage   = null;

    public function mount()
    {
        $this->departments = Department::get();
    }

    public function search()
    {
        $this->reset(['defect', 'subDefect', 'errorMessage']);

        if (!$this->defect_code || !$this->department_id) {
            $this->errorMessage = 'کد عیب و دپارتمان الزامی است';
            return;
        }

        $parts = explode('.', $this->defect_code);

        if (count($parts) != 2) {
            $this->errorMessage = 'فرمت کد صحیح نیست (مثال: 6.3)';
            return;
        }

        $defectCode = $parts[0];
        $subCode    = $parts[1];

        $this->defect = Defect::where('code', $defectCode)->first();

        if (!$this->defect) {
            $this->errorMessage = 'عیب یافت نشد';
            return;
        }

        $this->subDefect = SubDefect::where('defect_id', $this->defect->id)
            ->where('code', $subCode)
            ->first();

        if (!$this->subDefect) {
            $this->errorMessage = 'زیر عیب یافت نشد';
            return;
        }

        $this->sectionIds = Section::where('department_id', $this->department_id)
            ->pluck('id')
            ->toArray();

        $this->processes = Process::where('sub_defect_id', $this->subDefect->id)
            ->whereIn('section_id', $this->sectionIds)
            ->orderByRaw('CAST(percent AS DECIMAL) desc')
            ->get();
    }

    public function submitRequest($processId, $sectionId)
    {
        $requestId = 'DR-' . time() . '-' . random_int(10000, 99999);

        DefectRequest::create([
            'user_id'           => 1,
            'defect_request_id' => $requestId,
            'section_id'        => $sectionId,
            'defect_id'         => $this->defect->id,
            'sub_defect_id'     => $this->subDefect->id,
            'process_id'        => $processId,
        ]);

        $this->dispatch('swal-success', id: $requestId);
    }

    public function render()
    {
        return view('livewire.defect-search');
    }
}
