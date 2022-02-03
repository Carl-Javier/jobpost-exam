<?php

namespace App\Services;

use App\Models\Jobs;
use App\Models\JobTypes;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class JobTypeService
 * @package App\Services
 */
class JobTypeService extends BaseService
{
    /**
     * JobTypeService constructor.
     * @param JobTypes $types
     */
    public function __construct(JobTypes $types)
    {
        $this->model = $types;
    }

    /**
     * @param array $data
     * @return JobTypes
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): JobTypes
    {
        DB::beginTransaction();
        try {
            $typesData = [
                'name' => $data['name'],
            ];

            $types = $this->model->create($typesData);

        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating your Job Types. ' . $e->getMessage()));
        }

        DB::commit();

        return $types;
    }


    /**
     * @param $types
     * @param array $data
     * @return JobTypes
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update($types, array $data = []): JobTypes
    {
        DB::beginTransaction();

        try {
            $typesResult = $this->model::where('id', $types)->first();

            $typesData = [
                'name' => $data['name'],
            ];

            $typesResult->update($typesData);


        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this Job Type. Please try again. ' . $e->getMessage()));
        }

        DB::commit();

        return $typesResult;
    }


    /**
     * @param JobTypes $types
     * @return bool
     * @throws GeneralException
     */
    public function destroy(JobTypes $types): bool
    {
        if ($types->delete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem deleting this Job Type. Please try again.'));
    }

}
