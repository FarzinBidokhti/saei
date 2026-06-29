<?php

namespace App\Http\Controllers\ApproveRequest;

use Illuminate\Http\Request;
use App\Models\DefectRequest;
use App\Http\Controllers\Controller;

class ApproveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_unless(auth()->user()->can('view defect requests'), 403);

        $user  = auth()->user();
        $query = DefectRequest::query()
            ->whereNotNull('reason_text');

        if (! $user->hasAnyRole(['owner', 'super admin'])) {
            $departmentIds = $user->departments()->pluck('departments.id');

            $query->whereIn('section_id', $departmentIds);
        }

        $pendingRequests = (clone $query)
            ->whereNull('approved_by')
            ->count();

        $reviewedRequests = (clone $query)
            ->whereNotNull('approved_by')
            ->count();

        return view('pages.approverequest.index', [
            'pendingRequests'  => $pendingRequests,
            'reviewedRequests' => $reviewedRequests,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(auth()->user()->can('create defect requests'), 403);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
