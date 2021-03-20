<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippingCompany', function (Blueprint $table) {
            $table->id();
            $table->integer("oil_cost");
            $table->string("tel");
            $table->integer("mini_weight");
            $table->integer("north_mini_weight_cost");
            $table->integer("bangkok_mini_weight_cost");
            $table->integer("east_mini_weight_cost");
            $table->integer("west_mini_weight_cost");
            $table->integer("northeast_mini_weight_cost");
            $table->integer("central_mini_weight_cost");
            $table->integer("south_mini_weight_cost");
            $table->integer("weight_to_kk");
            $table->string("product_type");
            $table->string("approximate_price");
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
        Schema::dropIfExists('shippingCompany');
    }
}
