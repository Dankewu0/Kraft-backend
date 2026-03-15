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
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropForeign(['priority_id']);

            $table->unsignedBigInteger('status_id')->nullable()->change();
            $table->unsignedBigInteger('priority_id')->nullable()->change();

            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('priority_id')->references('id')->on('priorities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropForeign(['priority_id']);

            $table->unsignedBigInteger('status_id')->nullable(false)->change();
            $table->unsignedBigInteger('priority_id')->nullable(false)->change();

            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('priority_id')->references('id')->on('priorities');
        });
    }
};
