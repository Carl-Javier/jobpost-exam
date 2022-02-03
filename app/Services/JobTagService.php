<?php

namespace App\Services;

use App\Models\Tags;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class JobTagService
 * @package App\Services
 */
class JobTagService extends BaseService
{
    /**
     * JobTagService constructor.
     * @param Tags $tags
     */
    public function __construct(Tags $tags)
    {
        $this->model = $tags;
    }

    /**
     * @param array $data
     * @return Tags
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Tags
    {
        DB::beginTransaction();
        try {
            $tagsData = [
                'name' => $data['name'],
            ];

            $tags = $this->model->create($tagsData);

        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating your Job JobTag. ' . $e->getMessage()));
        }

        DB::commit();

        return $tags;
    }


    /**
     * @param $tags
     * @param array $data
     * @return Tags
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update($tags, array $data = []): Tags
    {
        DB::beginTransaction();

        try {
            $tagsResult = $this->model::where('id', $tags)->first();

            $tagsData = [
                'name' => $data['name'],
            ];

            $tagsResult->update($tagsData);


        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this Job Tag. Please try again. ' . $e->getMessage()));
        }

        DB::commit();

        return $tagsResult;
    }


    /**
     * @param Tags $types
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Tags $tags): bool
    {
        if ($tags->delete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem deleting this Job Tag. Please try again.'));
    }

}
