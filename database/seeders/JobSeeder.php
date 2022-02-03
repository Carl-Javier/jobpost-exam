<?php

namespace Database\Seeders;

use App\Models\Jobs;
use App\Models\Tags;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

/**
 * Class JobSeeder
 * @package Database\Seeders
 */
class JobSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->truncate('jobs');

        if (app()->environment(['local', 'testing'])) {
            /*
             * Note: There is currently no UI for this feature. If you are going to build a UI, and if you are going to use a WYSIWYG editor for the message (because it supports HTML on the frontend) that you properly sanitize the input before it is stored in the database.
             */
            Jobs::create([
                'title' => 'Senior Fullstack PHP Developer',
                'company_name' => 'Outsourced',
                'salary_details' => '£25,000 – £35,000',
                'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                'is_published' => 1,
                'expiration_date' => '2022-03-01 12:12',
                'published_date' => '2022-02-01 12:12',
            ]);
            Jobs::create([
                'title' => 'PHP Developer',
                'company_name' => 'IDEMIA',
                'salary_details' => '£25,000 – £35,000',
                'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                'is_published' => 1,
                'expiration_date' => '2022-03-01 12:12',
                'published_date' => '2022-02-01 12:12',
            ]);
            Jobs::create([
                'title' => 'Web Developer (ServiceNow/JavaScript) - Consultant - TS&T - Philippines',
                'company_name' => 'IDEMIA',
                'salary_details' => '£25,000 – £35,000',
                'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                'is_published' => 1,
                'expiration_date' => '2022-03-01 12:12',
                'published_date' => '2022-02-01 12:12',
            ]);
            Jobs::create([
                'title' => '100% Remote PHP Developer',
                'company_name' => 'IDEMIA',
                'salary_details' => '£25,000 – £35,000',
                'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                'is_published' => 1,
                'expiration_date' => '2022-03-01 12:12',
                'published_date' => '2022-02-01 12:12',
            ]);
            Jobs::create([
                'title' => 'PHP Web Developer - 100% remote!',
                'company_name' => 'IDEMIA',
                'salary_details' => '£25,000 – £35,000',
                'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                'is_published' => 1,
                'expiration_date' => '2022-03-01 12:12',
                'published_date' => '2022-02-01 12:12',
            ]);

        }

        $this->enableForeignKeys();
    }
}
