<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view dashboard'         => 'مشاهده داشبورد',
            'view users'             => 'مشاهده کاربران',
            'create users'           => 'ایجاد کاربر',
            'edit users'             => 'ویرایش کاربران',
            'delete users'           => 'حذف کاربران',

            'view roles'             => 'مشاهده نقش‌ها',
            'create roles'           => 'ایجاد نقش',
            'edit roles'             => 'ویرایش نقش‌ها',
            'delete roles'           => 'حذف نقش‌ها',

            'view permissions'       => 'مشاهده مجوزها',
            'create permissions'     => 'ایجاد مجوز',
            'edit permissions'       => 'ویرایش مجوزها',
            'delete permissions'     => 'حذف مجوزها',

            'view defects'           => 'مشاهده عیوب',
            'create defects'         => 'ایجاد عیب',
            'edit defects'           => 'ویرایش عیوب',
            'delete defects'         => 'حذف عیوب',

            'view subdefects'        => 'مشاهده زیرعیوب',
            'create subdefects'      => 'ایجاد زیرعیب',
            'edit subdefects'        => 'ویرایش زیرعیوب',
            'delete subdefects'      => 'حذف زیرعیوب',

            'view departments'       => 'مشاهده دپارتمان‌ها',
            'create departments'     => 'ایجاد دپارتمان',
            'edit departments'       => 'ویرایش دپارتمان‌ها',
            'delete departments'     => 'حذف دپارتمان‌ها',

            'view defect requests'   => 'مشاهده درخواست‌های عیب',
            'create defect requests' => 'ایجاد درخواست عیب',
            'edit defect requests'   => 'ویرایش درخواست‌های عیب',
            'delete defect requests' => 'حذف درخواست‌های عیب',

            'view approverequests'   => 'مشاهده تایید درخواست',
            'create approverequests' => 'ایجاد تایید درخواست',
            'edit approverequests'   => 'ویرایش تایید درخواست',
            'delete approverequests' => 'حذف تایید درخواست',

            'assign roles to users'       => 'تخصیص نقش به کاربران',
            'assign permissions to roles' => 'تخصیص مجوز به نقش‌ها',

            'view login logs' => 'مشاهده لاگ ورود کاربران',
            'import data'     => 'ایمپورت اطلاعات',
        ];

        foreach ($permissions as $name => $label) {
            Permission::updateOrCreate(
                [
                    'name'       => $name,
                    'guard_name' => 'web',
                    'label'      => $label,
                    'is_show'    => true
                ],
            );
        }
    }
}
