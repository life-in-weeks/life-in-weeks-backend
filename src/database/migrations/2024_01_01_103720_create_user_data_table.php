<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("user_data", function (Blueprint $table) {
            $table->id();
            $table->date("date_of_birth");
            $table->string("name");
            $table->string("lastname");
            $table
                ->foreignId("user_auth_id")
                ->constrained()
                ->on("user_auth")
                ->onDelete("cascade");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("user_data");
    }
};
