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
        Schema::table("site_contatos", function (Blueprint $table) {
            $table->foreign("motivo_contatos_id")->references("id")->on("motivo_contatos");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("site_contatos", function (Blueprint $table) {
            $table->dropForeign(["site_contatos_motivo_contatos_id_foreign"]);
        });
    }
};
