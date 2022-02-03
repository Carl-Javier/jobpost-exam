<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Tags\StoreRequest;
use App\Http\Requests\Backend\Tags\UpdateRequest;
use App\Models\Tags;
use App\Services\JobTagService;

/**
 * Class JobTagController
 * @package App\Http\Controllers\Backend
 */
class JobTagController
{
    /**
     * @var JobTagService $jobTagService
     */
    protected $jobTagService;

    /**
     * JobTagController constructor.
     * @param JobTagService $jobTagService
     */
    public function __construct(JobTagService $jobTagService)
    {
        $this->jobTagService = $jobTagService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.job-tag.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('backend.job-tag.create');
    }

    /**
     * @param StoreRequest $request
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreRequest $request)
    {
        $this->jobTagService->store($request->validated(), $request);

        return redirect()->route('admin.tags.list')->withFlashSuccess(__('The Job Tag was successfully created.'));
    }

    /**
     * @param UpdateRequest $request
     * @param $tags
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateRequest $request, $tags)
    {
        $this->jobTagService->update($tags, $request->validated(), $request);

        return redirect()->route('admin.tags.list')->withFlashSuccess(__('The Job Tag was successfully updated.'));
    }

    /**
     * @param Tags $tags
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Tags $tags)
    {
        return view('backend.job-tag.edit', compact('tags'));
    }

    /**
     * @param Tags $tags
     * @return mixed
     */
    public function delete(Tags $tags)
    {
        $this->jobTagService->destroy($tags);
        return redirect()->route('admin.tags.list')->withFlashSuccess(__('The Job Tag was successfully deleted.'));
    }
}
