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
    public function up()
    {
        // Schema::create('visa_sub_documents', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('visa_document_id');
        //     $table->enum('status',[1,0])->default(1);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visa_sub_documents');
    }
};
