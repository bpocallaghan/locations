<?php

namespace Bpocallaghan\Locations\Models;

use Titan\Models\TitanCMSModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends TitanCMSModel
{
    use SoftDeletes;

    protected $table = 'provinces';

    protected $guarded = ['id'];

    /**
     * Validation rules for this model
     */
    static public $rules = [
        'title'       => 'required|min:3:max:255',
        'country_id' => 'required|exists:countries,id',
    ];

    /**
     * Get the country
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    
    /**
     * Get all the rows as an array (ready for dropdowns)
     *
     * @return array
     */
    public static function getAllLists()
    {
    	return self::orderBy('title')->get()->pluck('title', 'id')->toArray();
    }
}