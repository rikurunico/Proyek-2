<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dormitories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone_number', 14);
            // $table->date('checkin_date')->nullable();
            // $table->date('checkout_date')->nullable();
            // $table->unsignedBigInteger('fk_id_room');
            // $table->unsignedBigInteger('fk_id_parent');
            // $table->foreign("fk_id_room")->references("id")->on("rooms")->onUpdate("cascade")->onDelete("cascade");
            // $table->foreign("fk_id_parent")->references("id")->on("parent_dormitories")->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dormitories');
    }
};
