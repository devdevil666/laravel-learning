<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

/**
 * @property string path
 */
class Photo extends Model
{
    protected $table = 'flyer_photos';

    protected $fillable = ['path'];

    protected static $baseDir = 'photos';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function flyer()
    {
        return $this->belongsTo(Flyer::class);
    }

    /**
     * @param UploadedFile $file
     * @return static
     */
    public static function fromForm(UploadedFile $file)
    {
        $photo = new static;
        $photo->path = $file->store(static::$baseDir, 'public');
        return $photo;
    }
}
