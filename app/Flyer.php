<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    protected $fillable = [
        'street',
        'city',
        'country',
        'state',
        'zip',
        'price',
        'description',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function getPriceAttribute($price)
    {
        return '$' . number_format($price);
    }

    public function scopeLocatedAt($query, $zip, $street)
    {
        $street = str_replace('-',' ', $street);
        return $query->where(compact('zip', 'street'))->first();
    }
}
