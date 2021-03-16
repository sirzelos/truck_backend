<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("name_recipient");
            $table->string("detail_address_recipient");
            $table->string("subdistrict_recipient");
            $table->string("district_recipient");
            $table->string("province_recipient");
            $table->string("postCode_recipient");
            $table->string("tel_recipient");
            $table->string("name_giver");
            $table->string("detail_address_giver");
            $table->string("subdistrict_giver");
            $table->string("district_giver");
            $table->string("province_giver");
            $table->string("postCode_giver");
            $table->string("tel_giver");
            $table->dateTime('pick_up_date');
            $table->dateTime('delivery_date');
            $table->string("product_type");
            $table->integer("weight_product");
            $table->integer('cost');
            $table->integer('status');
            $table->longText('created_at');
            $table->longText('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
