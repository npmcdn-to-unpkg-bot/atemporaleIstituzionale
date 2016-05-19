<?php namespace Acme\Catalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateOfferingsTable extends Migration
{

    public function up()
    {
        Schema::create('acme_catalog_offerings', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('acme_catalog_offerings_services', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('offering_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->primary(['offering_id', 'service_id'], 'offering_service');
        });
    }

    public function down()
    {
        Schema::dropIfExists('acme_catalog_offerings');
        Schema::dropIfExists('acme_catalog_offerings_services');
    }

}
