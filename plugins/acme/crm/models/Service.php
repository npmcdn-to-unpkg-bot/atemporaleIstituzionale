<?php namespace Acme\Crm\Models;

use Model;

/**
 * Contact Model
 */
class Service extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'acme_crm_services';

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
        'service' => ['Acme\Catalog\Models\Service'],
        'owner' => ['Backend\Models\User'],
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function getStatusOptions($keyValue = null)
    {
        return [
            'Inizio: 0%' => 'Inizio: 0%',
            'Briefing: 5%' => 'Briefing: 5%',
            'Analisi di mercato: 15%' => 'Analisi di mercato: 15%',
            'Definizione degli obiettivi: 20%' => 'Definizione degli obiettivi: 20%',
            'Concettualizzazione: 25%' => 'Concettualizzazione: 25%',
            'Metaprogettazione: 30%' => 'Metaprogettazione: 30%',
            'Sviluppo del progetto: 40%' => 'Sviluppo del progetto: 40%',
            'Testing: 65%' => 'Testing: 65%',
            'Realizzazione di esecutivi: 75%' => 'Realizzazione di esecutivi: 75%',
            'Testing: 95%' =>'Testing: 95%',
            'Consegna: 100%' =>'Consegna: 100%',
        ];
    }

}