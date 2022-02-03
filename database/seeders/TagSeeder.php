<?php

namespace Database\Seeders;

use App\Models\Tags;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

/**
 * Class TagSeeder
 * @package Database\Seeders
 */
class TagSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->truncate('tags');

        if (app()->environment(['local', 'testing'])) {
            /*
             * Note: There is currently no UI for this feature. If you are going to build a UI, and if you are going to use a WYSIWYG editor for the message (because it supports HTML on the frontend) that you properly sanitize the input before it is stored in the database.
             */
            Tags::create([
                'name' => 'remote',
            ]);
            Tags::create([
                'name' => 'office base',
            ]);
            Tags::create([
                'name' => 'remote/onsite',
            ]);

        }

        $this->enableForeignKeys();
    }
}
