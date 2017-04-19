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
        $photo->name = $file->getClientOriginalName();
        $photo->thumbnail_path = $photo->thumb($file);

        return $photo;
    }

    public function thumb(UploadedFile $file)
    {
        $thumbnail_path =  'photos/tm-' . md5($file->getClientOriginalName()) . time() .'.'. $file->extension();
        $image = Image::make(Storage::disk('public')->get($this->path))
            ->fit(200)
            ->stream();
        Storage::disk('public')->put("{$thumbnail_path}", $image);
        return $thumbnail_path;
    }
}
