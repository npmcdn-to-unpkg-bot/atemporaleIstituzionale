<?php namespace Acme\Crm\Models;

use Model;

/**
 * Contact Model
 */
class Collaborator extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'acme_crm_collaborators';

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'opportunity' => ['Acme\Crm\Models\Opportunity'],
        'owner' => ['Backend\Models\User'],
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}