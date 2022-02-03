<?php

namespace Database\Seeders;

use App\Domains\Announcement\Models\Announcement;
use App\Models\JobTypes;
use App\Models\Tags;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

/**
 * Class TypeSeeder
 * @package Database\Seeders
 */
class TypeSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->truncate('types');

        if (app()->environment(['local', 'testing'])) {
            /*
             * Note: There is currently no UI for this feature. If you are going to build a UI, and if you are going to use a WYSIWYG editor for the message (because it supports HTML on the frontend) that you properly sanitize the input before it is stored in the database.
             */
            JobTypes::create([
                'name' => 'IT',
            ]);
            JobTypes::create([
                'name' => 'Project Manager',
            ]);

        }

        $this->enableForeignKeys();
    }
}
