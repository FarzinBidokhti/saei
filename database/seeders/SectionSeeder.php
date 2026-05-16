<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            'تایرسازی تک مرحله‌ای (TR)',
            'رنگ زنی تایر (RN)',
            'پرس پخت (CU)',
            'تایرسازی مرحله 1 (TR1P)',
            'تایرسازی مرحله 1 (TR1N)',
            'تایرسازی مرحله 2 (TR2)',
            'ایستگاه تعمیرات',
            'خرید مواد (PM)',
            'توزین دستی مواد (MW)',
            'توزین اتومات مواد (AUW)',
            'اختلاط آمیزه-مستر (BM)',
            'اختلاط آمیزه-فاینال (BF)',
            'اختلاط آمیزه-لاین C (BC)',
            'کلندر چهار رول نخی (CL)',
            'کلندر چهار رول سیمی (CS)',
            'اکسترودر دوبلکس (ED)',
            'اکسترودر تریپلکس (ET)',
            'کلندر کوشین (GC)',
            'اکسترودر کوادروپلکس ترد (EQT)',
            'اکسترودر کوادروپلکس سایدوال (EQS)',
            'رولرهد دوکامپانده (EIL)',
            'برش عرضی لایه B.C (CT1)',
            'برش اسلیتر (CT2)',
            'برش مینی اسلیتر (MCT)',
            'برش بلت سیمی (WBT)',
            'بیدفرم اسکوار (FR)',
            'بیدفرم هگزاگونال (FH)',
            'فیلرزنی A (FLA)',
            'فیلرزنی BCD (FLBCD)',
            'استیلاستیک ABC (BL)',
            'تریمکاری و بازرسی تایر (TE)',
            'بازرسی تایر (TE1)',
            'یونیفرمیتی (TE2)',
            'X-Ray (TE3)',
            'ارسال به مشتری (SC)'
        ];

        foreach ($sections as $title) {
            Section::firstOrCreate(['title' => $title], ['department_id' => 1]);
        }
    }
}
