<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;

        $permissionArray[$i]['name']       = 'dashboard';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'administrators';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'administrators_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'administrators_edit';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'administrators_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'administrators_show';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'customers';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'customers_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'customers_edit';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'customers_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'customers_show';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'students';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'students_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'students_edit';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'students_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'students_show';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'organisations';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'organisations_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'organisations_edit';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'organisations_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'organisations_show';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'exams';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'exams_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'exams_edit';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'exams_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'exams_show';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'role';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'role_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'role_edit';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'role_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'role_show';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'banner';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'banner_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'banner_edit';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'banner_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'page';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'page_create';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'page_edit';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'page_delete';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'updates';
        $permissionArray[$i]['guard_name'] = 'web';

        $i++;
        $permissionArray[$i]['name']       = 'setting';
        $permissionArray[$i]['guard_name'] = 'web';

        Permission::insert($permissionArray);
    }
}
