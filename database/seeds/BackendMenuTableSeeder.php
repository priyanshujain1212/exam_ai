<?php

use App\Models\BackendMenu;
use Illuminate\Database\Seeder;

class BackendMenuTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $menus = [
            [
                'name'      => 'Dashboard',
                'link'      => 'dashboard',
                'icon'      => 'fas fa-laptop',
                'parent_id' => 0,
                'priority'  => 600,
                'status'    => 1,
            ],
           
            [
                'name'      => 'Customers',
                'link'      => 'customers',
                'icon'      => 'fas fa-user-secret',
                'parent_id' => 0,
                'priority'  => 580,
                'status'    => 1,
            ],
            [
                'name'      => 'Students',
                'link'      => 'studenTs',
                'icon'      => 'fas fa-user-secret',
                'parent_id' => 0,
                'priority'  => 560,
                'status'    => 1,
            ],
            [
                'name'      => 'Organisations',
                'link'      => 'organisations',
                'icon'      => 'fas fa-user-secret',
                'parent_id' => 0,
                'priority'  => 540,
                'status'    => 1,
            ],
          
            [
                'name'      => 'Exams',
                'link'      => 'exams',
                'icon'      => 'fas fa-user-secret',
                'parent_id' => 0,
                'priority'  => 520,
                'status'    => 1,
            ],

            [
                'name'      => 'Administrators',
                'link'      => 'administrators',
                'icon'      => 'fas fa-users',
                'parent_id' => 0,
                'priority'  => 500,
                'status'    => 1,
            ],
          
            [
                'name'      => 'Role',
                'link'      => 'role',
                'icon'      => 'fas fa-star',
                'parent_id' => 0,
                'priority'  => 480,
                'status'    => 1,
            ],

            [
                'name'      => 'Banners',
                'link'      => 'banner',
                'icon'      => 'fas fa-film',
                'parent_id' => 0,
                'priority'  => 460,
                'status'    => 1,
            ],
            [
                'name'      => 'Pages',
                'link'      => 'page',
                'icon'      => 'fas fa-sticky-note',
                'parent_id' => 0,
                'priority'  => 440,
                'status'    => 1,
            ],


            [
                'name'      => 'Updates',
                'link'      => 'updates',
                'icon'      => 'fas fa-cloud-download-alt',
                'parent_id' => 0,
                'priority'  => 370,
                'status'    => 1,
            ],
            [
                'name'      => 'Settings',
                'link'      => 'setting',
                'icon'      => 'fas fa-cogs',
                'parent_id' => 0,
                'priority'  => 360,
                'status'    => 1,
            ],
        ];

        BackendMenu::insert($menus);
    }
}
