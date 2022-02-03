<?php

namespace App\Services;

use App\Models\Jobs;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class JobsService
 * @package App\Services
 */
class JobsService extends BaseService
{
    /**
     * JobsService constructor.
     * @param Jobs $jobs
     */
    public function __construct(Jobs $jobs)
    {
        $this->model = $jobs;
    }

    /**
     * @param array $data
     * @return Jobs
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Jobs
    {
        DB::beginTransaction();
        try {
            $jobsData = [
                'title' => $data['title'],
                'description' => $data['description'],
                'company_name' => $data['company_name'],
                'salary_details' => $data['salary_details'],
                'is_published' => $data['is_published'] ?? 0,
                'published_date' => $data['published_date'],
                'expiration_date' => $data['expiration_date'],
            ];

            $job = $this->model->create($jobsData);
            foreach ($data['tag'] as $tag) {

                $job->tags()->attach($tag);
            }
            foreach ($data['type'] as $type) {

                $job->types()->attach($type);
            }
            foreach ($data['country'] as $country) {

                $job->countries()->attach($country);
            }

        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating your job. ' . $e->getMessage()));
        }

        DB::commit();

        return $job;
    }


    /**
     * @param $article
     * @param array $data
     * @param $file
     * @return Article
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update($jobs, array $data = [], $file): Jobs
    {
        DB::beginTransaction();

        try {
            $jobsResult = $this->model::where('id', $jobs)->first();

            $jobsData = [
                'title' => $data['title'],
                'description' => $data['description'],
                'company_name' => $data['company_name'],
                'salary_details' => $data['salary_details'],
                'is_published' => $data['is_published'] ?? 0,
                'published_date' => $data['published_date'],
                'expiration_date' => $data['expiration_date'],
            ];

            $jobsResult->update($jobsData);

            foreach ($data['tag'] as $tag) {

                $jobsResult->tags()->where('tags_id', $tag)->detach($tag);
                $jobsResult->tags()->attach($tag);
            }
            foreach ($data['type'] as $type) {
                $jobsResult->types()->where('types_id', $type)->detach($type);
                $jobsResult->types()->attach($type);
            }
            foreach ($data['country'] as $country) {
                $jobsResult->countries()->where('countries_id', $country)->detach($country);
                $jobsResult->countries()->attach($country);
            }


        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this Jobs. Please try again. ' . $e->getMessage()));
        }

        DB::commit();

        return $jobsResult;
    }


    /**
     * @param Jobs $jobs
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Jobs $jobs): bool
    {
        if ($jobs->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem deleting this job. Please try again.'));
    }


    /**
     * @return bool
     */
    public function checkForPublishingJobs(): bool
    {
        $jobsPublished = $this->model::where('published_date', 'like', '%' . date('Y-m-d H:i') . '%')
            ->where('is_published', Jobs::UNPUBLISHED)->get();
        foreach ($jobsPublished as $publish) {
            $this->model->where('id', $publish->id)->update(['is_published' => Jobs::PUBLISHED]);
        }
        return true;
    }

    /**
     * @param Jobs $jobs
     * @return bool
     * @throws GeneralException
     */
    public function checkForExpiringJobs(): bool
    {
        $jobsPublished = $this->model::where('expiration_date', 'like', '%' . date('Y-m-d H:i') . '%')
            ->where('is_published', Jobs::PUBLISHED)->get();
        foreach ($jobsPublished as $publish) {
            $this->model->where('id', $publish->id)->update(['is_published' => Jobs::UNPUBLISHED]);
        }
        return true;
    }

}
