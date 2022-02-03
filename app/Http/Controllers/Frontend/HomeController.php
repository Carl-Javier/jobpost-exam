<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Jobs;
use App\Models\JobTypes;
use App\Services\JobsService;

/**
 * Class HomeController.
 */
class HomeController
{
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
        $search = request()->query('search');
        $searchTags = request()->query('tags');
        $searchTypes = request()->query('types');

        if ($search) {
            $jobs = Jobs::where('is_published', Jobs::PUBLISHED)->where('title', 'like', "%{$search}%")->paginate(3);
        }
        if ($searchTags) {
            $jobs = Jobs::whereHas('tags', function ($query) use ($searchTags) {
                $query->where('id', $searchTags);
            })->where('is_published', Jobs::PUBLISHED)->paginate(3);
        }
        if ($searchTypes) {
            $jobs = Jobs::whereHas('types', function ($query) use ($searchTypes) {
                $query->where('id', $searchTypes);
            })->where('is_published', Jobs::PUBLISHED)->paginate(3);
        }

        if (!$search && !$searchTags && !$searchTypes) {
            $jobs = Jobs::where('is_published', Jobs::PUBLISHED)->paginate(3);
        }

        return view('frontend.index', ['jobs' => $jobs]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $job = Jobs::where('id', $id)->first();
        return view('frontend.job-view', ['job' => $job]);
    }
}
