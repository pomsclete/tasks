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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('employe_id')->constrained()->onDelete('cascade');
            // 1 : haute priorité, 2: moyenne priorité, 3: basse priorité
            $table->integer('priority')->default(1)->comment('1 : haute priorité, 2: moyenne priorité, 3: basse priorité');
             // 0: en attente, 1: en cours, 2: terminé
            $table->integer('status')->default(0)->comment('0: en attente, 1: en cours, 2: terminé');
            $table->date('due_date')->nullable(); // Date d'échéance
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
