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
        Schema::create('payment_logs', function (Blueprint $table) {
            $table->id();
            $table->string('total_month');
            $table->date('from');
            $table->date('to');
            $table->string('proof_payment')->nullable();
            $table->unsignedBigInteger('fk_id_kind_paymentlogs')->nullable();
            $table->foreign("fk_id_kind_paymentlogs")->references("id")->on("kind_payment_logs")->nullOnDelete();
            $table->unsignedBigInteger('fk_id_dormitory')->nullable();
            $table->foreign("fk_id_dormitory")->references("id")->on("dormitories")->nullOnDelete();
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
        Schema::dropIfExists('payment_logs');
    }
};
