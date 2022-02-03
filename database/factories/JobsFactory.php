<?php

namespace Database\Factories;

use App\Domains\Auth\Models\Jobs;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class JobsFactory
 * @package Database\Factories
 */
class JobsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jobs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
//            'type' => $this->faker->randomElement([User::TYPE_ADMIN, User::TYPE_USER]),
            'title' => $this->faker->title,
        ];
    }
}
