<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('defect_requests', function (Blueprint $table) {
            Schema::table('defect_requests', function (Blueprint $table) {
                $table->bigInteger('process_id')->nullable()->change();
                $table->bigInteger('section_id')->nullable()->change();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('defect_requests', function (Blueprint $table) {
            $table->bigInteger('process_id')->nullable(false)->change();
            $table->bigInteger('section_id')->nullable(false)->change();
        });
    }
};
