<?php namespace Acme\Catalog\Models;

use Model;

/**
 * Contact Model
 */
class Service extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'acme_catalog_services';

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}