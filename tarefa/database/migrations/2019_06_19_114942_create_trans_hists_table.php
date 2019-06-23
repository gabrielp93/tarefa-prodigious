<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransHistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_hists', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned(); // chave estrangeira
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->double('amount',10,2); //total movimentado
            $table->double('before',10,2); //saldo anterior
            $table->double('after',10,2); //saldo posterior

            $table->enum('type',['In','Out','Trans']); //tipo de movimentacao
            $table->integer('user_id_trans')->nullable(); //usuario que fez a movimentacao
        
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trans_hists');
    }
}
