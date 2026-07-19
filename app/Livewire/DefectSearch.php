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

    public $departments  = [];
    public $defect       = null;
    public $subDefect    = null;
    public $processes    = null;
    public $sectionIds   = null;
    public $errorMessage = null;

    public $manual_process_id = null;
    public $reason_text       = null;

    public function mount()
    {
        abort_unless(auth()->user()->can('create defect requests'), 403);

        $this->departments = auth()->user()->departments;

        if ($this->departments->count() === 1) {
            $this->department_id = $this->departments->first()->id;
        }
    }

    public function search()
    {
        abort_unless(auth()->user()->can('create defect requests'), 403);

        $this->reset([
            'defect',
            'subDefect',
            'errorMessage',
            'processes',
            'sectionIds',
            'manual_process_id',
            'reason_text',
        ]);

        if (blank($this->defect_code) || blank($this->department_id)) {
            $this->errorMessage = 'کد عیب و دپارتمان الزامی است';
            return;
        }

        $normalizedCode = trim($this->defect_code);

        if (!preg_match('/^\d+(?:\.\d+)?$/', $normalizedCode)) {
            $this->errorMessage = 'فرمت کد صحیح نیست؛ برای مثال 6، 6.0 یا 6.3 وارد کنید.';
            return;
        }

        if (!str_contains($normalizedCode, '.')) {
            $normalizedCode .= '.0';
        }

        $this->defect_code = $normalizedCode;

        [$defectCode, $subCode] = explode('.', $normalizedCode, 2);

        dd($defectCode . ' - ' . $subCode);

        $this->defect = Defect::query()
            ->where('code', $defectCode)
            ->first();

        if (!$this->defect) {
            $this->errorMessage = 'عیب یافت نشد';
            return;
        }

        $this->subDefect = SubDefect::query()
            ->where('defect_id', $this->defect->id)
            ->where('code', $subCode)
            ->first();

        if (!$this->subDefect) {
            $this->errorMessage = 'زیر عیب یافت نشد';
            return;
        }

        $this->sectionIds = Section::query()
            ->where('department_id', $this->department_id)
            ->pluck('id')
            ->all();

        $this->processes = Process::query()
            ->where('sub_defect_id', $this->subDefect->id)
            ->whereIn('section_id', $this->sectionIds)
            ->orderByRaw('CAST(percent AS DECIMAL) DESC')
            ->get();
    }

    public function submitRequest($processId, $sectionId)
    {
        $this->storeRequest(
            processId: $processId,
            sectionId: $sectionId,
            reasonText: null,
            type: false
        );
    }

    public function submitManualRequest()
    {
        abort_unless(auth()->user()->can('create defect requests'), 403);

        $this->validate([
            'reason_text' => ['required', 'string', 'max:250'],
        ], [
            'reason_text.required' => 'لطفا متن علت را وارد کنید.',
            'reason_text.max'      => 'متن علت نباید بیشتر از ۲۵۰ کاراکتر باشد.',
        ]);

        $process = Process::where('id', $this->manual_process_id)
            ->where('sub_defect_id', $this->subDefect->id)
            ->whereIn('section_id', $this->sectionIds ?? [])
            ->first();


        $this->storeRequest(
            processId: null,
            sectionId: null,
            reasonText: $this->reason_text,
            type: true
        );

        $this->reset([
            'reason_text',
        ]);

        $this->dispatch('close-modal');
    }

    private function storeRequest($processId, $sectionId, $reasonText = null, bool $type = false)
    {
        abort_unless(auth()->user()->can('create defect requests'), 403);

        if (!$this->defect || !$this->subDefect) {
            $this->errorMessage = 'ابتدا باید عیب و زیرعیب را جستجو کنید.';
            return;
        }

        $requestId = time() . random_int(10000, 99999);

        DefectRequest::create([
            'user_id'           => auth()->id(),
            'defect_request_id' => $requestId,
            'section_id'        => $sectionId,
            'defect_id'         => $this->defect->id,
            'sub_defect_id'     => $this->subDefect->id,
            'process_id'        => $processId,
            'reason_text'       => $reasonText,
            'type'              => $type,
        ]);

        $this->dispatch('swal-success', id: $requestId);
    }

    public function render()
    {
        return view('livewire.defect-search');
    }
}
