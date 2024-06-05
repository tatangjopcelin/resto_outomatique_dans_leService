<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom_du_produit', 30);
            $table->smallInteger('prix_du_produit');
            $table->string('uri_image_produit');
            $table->string('status_du_produit');
            $table->foreignId('id_cathegories')
                ->references('id')
                ->on('cathegories')
                ->onDelete('cascades');

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
        Schema::dropIfExists('produits');
    }
}
