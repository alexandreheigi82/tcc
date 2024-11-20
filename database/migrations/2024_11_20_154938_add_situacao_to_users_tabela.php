<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users_tabela', function (Blueprint $table) {
            $table->boolean('situacao')->default(1)->after('senha'); // Adiciona a coluna situacao com valor padrão de 1 (ativo)
        });
    }

    public function down()
    {
        Schema::table('users_tabela', function (Blueprint $table) {
            $table->dropColumn('situacao'); // Remove a coluna situacao
        });
    }
};
