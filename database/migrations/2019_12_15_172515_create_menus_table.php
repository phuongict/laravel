<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name', 100);
            $table->string('value', 100);
            $table->tinyInteger('type')->default(0);
            $table->integer('parent')->default(0);
            $table->integer('order')->default(1);
            $table->string('icon')->default('fas fa-circle nav-icon');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('location')->default(0);
            $table->unsignedBigInteger('permission_id');
            $table->timestamps();

            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
