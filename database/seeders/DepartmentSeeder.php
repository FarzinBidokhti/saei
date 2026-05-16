<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            'بنبوری و توزین مواد',
            'نیمه ساخته ها',
            'اکسترودرها',
            'تایرسازی',
            'پرس پخت و رنگ زنی'
        ];

        foreach ($departments as $title) {
            Department::firstOrCreate(['title' => $title]);
        }
    }
}
