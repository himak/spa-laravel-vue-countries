<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Country extends Model
{
    use HasFactory;

    protected $primaryKey = 'country_id';

    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
        'full_name',
        'iso3',
        'number',
        'continent_code'
    ];

    /**
     * Get the continent that owns the country.
     */
    public function continent(): BelongsTo
    {
        return $this->belongsTo(Continent::class, 'continent_code', 'code');
    }
}
