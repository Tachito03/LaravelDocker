<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroaccesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registroaccesos', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 20);
            $table->string('estado', 10);
            $table->foreignId('id_usuario')
            ->constrained('users');
            $table->datetime('fechaacceso')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registroaccesos');
    }
}
