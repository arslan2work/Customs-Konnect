<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAciManifestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aci_manifests', function (Blueprint $table) {
            $table->id();
            $table->string('tripNumber');
            $table->string('portOfEntry');
            $table->string('subLocation');
            $table->string('truck');
            $table->string('trailer');
            $table->string('driver');
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
        Schema::dropIfExists('aci_manifests');
    }
}
