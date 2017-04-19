<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer user_id
 */
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
        'user_id'
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
        return $query->where(compact('zip', 'street'));
    }

    /**
     * Add photo to flyer
     * @param Photo $photo
     * @return false|Model
     */
    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @param User $user
     * @return bool
     */
    public function ownedBy(User $user)
    {
        return $this->user_id == $user->id;
    }
}
