<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('defect_requests', function (Blueprint $table) {
            $table->bigInteger('process_id')->nullable()->change();
            $table->bigInteger('section_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('defect_requests', function (Blueprint $table) {
            // $table->bigInteger('process_id')->nullable(false)->change();
            // $table->bigInteger('section_id')->nullable(false)->change();
            DB::table('defect_requests')
                ->whereNull('process_id')
                ->delete();

            DB::table('defect_requests')
                ->whereNull('section_id')
                ->delete();

            Schema::table('defect_requests', function (Blueprint $table) {
                $table->bigInteger('process_id')->nullable(false)->change();
                $table->bigInteger('section_id')->nullable(false)->change();
            });
        });
    }
};
