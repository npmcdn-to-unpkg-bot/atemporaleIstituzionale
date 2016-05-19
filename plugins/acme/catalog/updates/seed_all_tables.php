<?php namespace Acme\Catalog\Updates;

use Acme\Catalog\Models\Offering;
use Acme\Catalog\Models\Service;
use October\Rain\Database\Updates\Seeder;

class SeedAllTables extends Seeder
{
    public function run()
    {
        //Offering::create(['name' => 'Web application', 'completion'=> 'Inizio', 'cost' => 300, 'price' => 600]);
    }
}
