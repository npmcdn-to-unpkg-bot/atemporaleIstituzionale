<?php namespace Acme\Catalog\Models;

use Model;

/**
 * Opportunity Model
 */
class Offering extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'acme_catalog_offerings';

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    /**
     * @var array Relations
     */
    public $hasMany = [];

    public $belongsTo = [];

    public $belongsToMany = [
        'services' => [
            'Acme\Catalog\Models\Service',
            'table' => 'acme_catalog_offerings_services'
        ],
    ];

}