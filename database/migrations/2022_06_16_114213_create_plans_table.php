<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_id')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('stripe_plan');
            $table->float('price');
            $table->text('description')->nullable();
            $table->text('characteristic')->nullable();
            $table->timestamp('fecha_creado')->useCurrent();
            $table->timestamp('fecha_actualizado')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
