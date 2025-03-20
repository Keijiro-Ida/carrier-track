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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->string('position');
            $table->text('attraction')->nullable();
            $table->text('concerns')->nullable();
            $table->foreignId('aspiration_level_id')->constrained();
            $table->foreignId('status_id')->constrained('application_statuses');
            $table->foreignId('final_status_id')->nullable()->constrained('application_statuses');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
