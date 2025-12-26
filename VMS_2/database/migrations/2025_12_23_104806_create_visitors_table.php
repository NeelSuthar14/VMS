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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('purpose');
            $table->string('person_to_meet');
            $table->string('id_proof_type');
            $table->string('id_proof_number');
            $table->string('photo')->nullable();
            $table->string('address');
            $table->string('age');
            $table->string('gender');
            $table->string('department');
            $table->string('block');
            $table->string('floor');
            $table->string('designation');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
