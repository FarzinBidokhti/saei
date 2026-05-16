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
        Schema::create('defect_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('defect_request_id')->unique();
            $table->bigInteger('section_id');
            $table->bigInteger('defect_id');
            $table->bigInteger('sub_defect_id');
            $table->bigInteger('process_id');
            $table->text('reason_text')->nullable();
            $table->boolean('type')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defect_requests');
    }
};
