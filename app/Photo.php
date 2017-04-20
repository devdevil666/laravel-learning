<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

//use Intervention\Image\ImageManagerStatic as Image;
/**
 * @property string path
 * @property null|string name
 * @property string thumbnail_path
 */
class Photo extends Model
{
    protected $table = 'flyer_photos';

    protected $fillable = ['path', 'name', 'thumbnail_path'];

    protected $file;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function flyer()
    {
        return $this->belongsTo(Flyer::class);
    }
}
