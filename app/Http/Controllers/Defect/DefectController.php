<?php

namespace App\Http\Controllers\Defect;

use App\Models\Defect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Defect\EditRequest;

class DefectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.defect.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Defect $defect)
    {
        return view('pages.defect.edit', compact('defect'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Defect $defect)
    {
        $defect->title = $request->title;
        $defect->save();

        Alert::success('موفقیت', 'عیب با موفقیت ویرایش شد.');
        return redirect()->route('defects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
