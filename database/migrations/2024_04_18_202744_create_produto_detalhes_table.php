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
        Schema::create('produto_detalhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->float('comprimento');
            $table->float('largura');
            $table->float('altura');
            $table->timestamps();
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unique('produto_id');
        });
        /**
         * php artisan migrate:status = mostra informações sobre as migrations
         * php artisan migrate:reset = faz o rollback de todas as migrations
         * php artisan migrate:refresh = faz o rollback das migrations e depois executa o comando migrate novamente
         * php artisan migrate:fresh = faz o drop das migrations e depois executa o comando migrate novamente
         * so pra ter oq commitar
         */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_detalhes');
    }
};
