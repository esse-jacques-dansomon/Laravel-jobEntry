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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('requirements');
            $table->text('responsibilities');
            $table->enum('type', ['full-time', 'part-time', 'freelance', 'internship']);
            $table->enum('status', ['active', 'inactive']);
            $table->string('location', 100);
            $table->string('salary', 100);
            //limit date
            $table->date('limit_date')->nullable();

            $table->foreignId('enterprise_id')->constrained('enterprises');
            $table->foreignId('category_id')->constrained('categories');

            $table->timestamps();

            //soft delete
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
