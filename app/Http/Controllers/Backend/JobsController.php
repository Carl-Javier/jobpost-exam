<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Jobs\StoreRequest;
use App\Http\Requests\Backend\Jobs\UpdateRequest;
use App\Models\Jobs;
use App\Services\JobsService;

/**
 * Class JobsController
 * @package App\Http\Controllers\Backend
 */
class JobsController
{
    /**
     * @var JobsService $jobsService
     */
    protected $jobsService;

    /**
     * JobsController constructor.
     * @param JobsService $jobsService
     */
    public function __construct(JobsService $jobsService)
    {
        $this->jobsService = $jobsService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.job-list.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('backend.job-list.create');
    }

    /**
     * @param StoreRequest $request
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreRequest $request)
    {
        $this->jobsService->store($request->validated(), $request);

        return redirect()->route('admin.jobs.list')->withFlashSuccess(__('The job was successfully created.'));
    }

    /**
     * @param Jobs $jobs
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Jobs $jobs)
    {
        return view('backend.job-list.detail', ['jobs' => $jobs]);
    }

    /**
     * @param UpdateRequest $request
     * @param $jobs
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateRequest $request, $jobs)
    {
        $this->jobsService->update($jobs, $request->validated(), $request);

        return redirect()->route('admin.jobs.list')->withFlashSuccess(__('The Job was successfully updated.'));
    }

    /**
     * @param Jobs $jobs
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Jobs $jobs)
    {
        return view('backend.job-list.edit', compact('jobs'));
    }

    public function delete(Jobs $jobs)
    {
        $this->jobsService->destroy($jobs);
        return redirect()->route('admin.jobs.list')->withFlashSuccess(__('The Job was successfully deleted.'));
    }
}
