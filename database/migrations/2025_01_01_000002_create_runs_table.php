<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('runs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('external_id')->nullable();
            $table->enum('status', ['running','passed','failed','stopped','skipped'])->default('running');
            $table->dateTime('started_at')->nullable();
            $table->dateTime('finished_at')->nullable();
            $table->integer('duration_seconds')->nullable();
            $table->integer('total')->default(0);
            $table->integer('passed')->default(0);
            $table->integer('failed')->default(0);
            $table->integer('skipped')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('runs'); }
};
