<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company_name');
            $table->string('location');
            $table->string('job_type');
            $table->string('salary')->nullable();
            $table->string('license_type')->nullable();
            $table->string('experience')->nullable();
            $table->integer('age_requirement')->nullable();
            $table->string('languages')->nullable();
            $table->string('education_level')->nullable();
            $table->string('vehicle_provided')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('shift_timing')->nullable();
            $table->text('description')->nullable();
            $table->string('route_type')->nullable();
            $table->string('working_hours')->nullable();
            $table->string('benefits')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->date('deadline')->nullable();
            $table->string('how_to_apply')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
