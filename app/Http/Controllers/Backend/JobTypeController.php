<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Types\StoreRequest;
use App\Http\Requests\Backend\Types\UpdateRequest;
use App\Models\Jobs;
use App\Models\JobTypes;
use App\Services\JobTypeService;

/**
 * Class JobTypeController
 * @package App\Http\Controllers\Backend
 */
class JobTypeController
{
    /**
     * @var JobTypeService $jobTypeService
     */
    protected $jobTypeService;

    /**
     * JobTypeController constructor.
     * @param JobTypeService $jobTypeService
     */
    public function __construct(JobTypeService $jobTypeService)
    {
        $this->jobTypeService = $jobTypeService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.job-type.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('backend.job-type.create');
    }

    /**
     * @param StoreRequest $request
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreRequest $request)
    {
        $this->jobTypeService->store($request->validated(), $request);

        return redirect()->route('admin.types.list')->withFlashSuccess(__('The Job Type was successfully created.'));
    }

    /**
     * @param UpdateRequest $request
     * @param $types
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateRequest $request, $types)
    {
        $this->jobTypeService->update($types, $request->validated(), $request);

        return redirect()->route('admin.types.list')->withFlashSuccess(__('The Job Type was successfully updated.'));
    }

    /**
     * @param JobTypes $types
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(JobTypes $types)
    {
        return view('backend.job-type.edit', compact('types'));
    }

    public function delete(JobTypes $types)
    {
        $this->jobTypeService->destroy($types);
        return redirect()->route('admin.types.list')->withFlashSuccess(__('The Job Type was successfully deleted.'));
    }
}
