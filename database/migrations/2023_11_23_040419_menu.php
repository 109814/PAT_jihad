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
        Schema::create('menu', function(Blueprint $table){
            $table->bigIncrements('id_menu');
            $table->string('nama');
            $table->string('name')->index();
            $table->string('harga');
            $table->enum('jenis',['makanan','minuman']);
            $table->timestamp('updated_at');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
