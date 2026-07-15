<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'title' => 'تایرسازی تک مرحله‌ای (TR)',
                'department_id' => 4,
            ],
            [
                'title' => 'رنگ زنی تایر (RN)',
                'department_id' => 5,
            ],
            [
                'title' => 'پرس پخت (CU)',
                'department_id' => 5,
            ],
            [
                'title' => 'تایرسازی مرحله 1 (TR1P)',
                'department_id' => 4,
            ],
            [
                'title' => 'تایرسازی مرحله 1 (TR1N)',
                'department_id' => 4,
            ],
            [
                'title' => 'تایرسازی مرحله 2 (TR2)',
                'department_id' => 4,
            ],
            [
                'title' => 'ایستگاه تعمیرات',
                'department_id' => 4,
            ],
            [
                'title' => 'خرید مواد (PM)',
                'department_id' => 1,
            ],
            [
                'title' => 'توزین دستی مواد (MW)',
                'department_id' => 1,
            ],
            [
                'title' => 'توزین اتومات مواد (AUW)',
                'department_id' => 1,
            ],
            [
                'title' => 'اختلاط آمیزه-مستر (BM)',
                'department_id' => 1,
            ],
            [
                'title' => 'اختلاط آمیزه-فاینال (BF)',
                'department_id' => 1,
            ],
            [
                'title' => 'اختلاط آمیزه-لاین C (BC)',
                'department_id' => 1,
            ],
            [
                'title' => 'کلندر چهار رول نخی (CL)',
                'department_id' => 2,
            ],
            [
                'title' => 'کلندر چهار رول سیمی (CS)',
                'department_id' => 2,
            ],
            [
                'title' => 'اکسترودر دوبلکس (ED)',
                'department_id' => 3,
            ],
            [
                'title' => 'اکسترودر تریپلکس (ET)',
                'department_id' => 3,
            ],
            [
                'title' => 'کلندر کوشین (GC)',
                'department_id' => 2,
            ],
            [
                'title' => 'اکسترودر کوادروپلکس ترد (EQT)',
                'department_id' => 3,
            ],
            [
                'title' => 'اکسترودر کوادروپلکس سایدوال (EQS)',
                'department_id' => 3,
            ],
            [
                'title' => 'رولرهد دوکامپانده (EIL)',
                'department_id' => 2,
            ],
            [
                'title' => 'برش عرضی لایه B.C (CT1)',
                'department_id' => 2,
            ],
            [
                'title' => 'برش اسلیتر (CT2)',
                'department_id' => 2,
            ],
            [
                'title' => 'برش مینی اسلیتر (MCT)',
                'department_id' => 2,
            ],
            [
                'title' => 'برش بلت سیمی (WBT)',
                'department_id' => 2,
            ],
            [
                'title' => 'بیدفرم اسکوار (FR)',
                'department_id' => 2,
            ],
            [
                'title' => 'بیدفرم هگزاگونال (FH)',
                'department_id' => 2,
            ],
            [
                'title' => 'فیلرزنی A (FLA)',
                'department_id' => 2,
            ],
            [
                'title' => 'فیلرزنی BCD (FLBCD)',
                'department_id' => 2,
            ],
            [
                'title' => 'استیلاستیک ABC (BL)',
                'department_id' => 2,
            ],
            [
                'title' => 'تریمکاری و بازرسی تایر (TE)',
                'department_id' => 4,
            ],
            [
                'title' => 'بازرسی تایر (TE1)',
                'department_id' => 4,
            ],
            [
                'title' => 'یونیفرمیتی (TE2)',
                'department_id' => 4,
            ],
            [
                'title' => 'X-Ray (TE3)',
                'department_id' => 4,
            ],
            [
                'title' => 'ارسال به مشتری (SC)',
                'department_id' => 4,
            ],
        ];

        foreach ($sections as $section) {
            Section::firstOrCreate(
                ['title'         => $section['title']],
                ['department_id' => $section['department_id']]
            );
        }
    }
}
