<?php namespace Acme\Catalog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateServicesTable extends Migration
{

    public function up()
    {
        Schema::create('acme_catalog_services', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->decimal('prezzomin')->nullable();
            $table->decimal('prezzomedio')->nullable();
            $table->decimal('prezzomax')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('acme_catalog_services');
    }

}
