<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_commandes', function (Blueprint $table) {
            $table->id();
            $table->string('quantite_produit');
            $table->integer('prix_unitaire');
            $table->integer('prix_total');
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
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
        Schema::dropIfExists('produit_commandes');
    }
}
