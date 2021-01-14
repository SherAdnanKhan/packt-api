<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUserProductsTable
 *
 * This is an temporary table to store user_id and product_id (SKU/ISBN) relationship
 * to work on ticket PLT-319, going forward it will be replaced by other data source
 * @author Saurabh Sharma
 */
class CreateUserProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->text('product_id');
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
        Schema::dropIfExists('user_products');
    }
}
