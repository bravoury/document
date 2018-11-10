<?php

namespace Litecms;

use DB;
use Illuminate\Database\Seeder;

class DocumentTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('documents')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'document.document.view',
                'name'      => 'View Document',
            ],
            [
                'slug'      => 'document.document.create',
                'name'      => 'Create Document',
            ],
            [
                'slug'      => 'document.document.edit',
                'name'      => 'Update Document',
            ],
            [
                'slug'      => 'document.document.delete',
                'name'      => 'Delete Document',
            ],
            
            
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/document/document',
                'name'        => 'Document',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/document/document',
                'name'        => 'Document',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'document',
                'name'        => 'Document',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
            [
                'pacakge'   => 'Document',
                'module'    => 'Document',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'document.document.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
