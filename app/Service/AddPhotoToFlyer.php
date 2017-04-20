<?php
namespace App\Service;


use App\Flyer;
use App\Photo;
use Illuminate\Http\UploadedFile;

class AddPhotoToFlyer
{
    /**
     * @var Flyer
     */
    private $flyer;
    /**
     * @var UploadedFile
     */
    private $file;

    protected static $baseDir = 'photos';

    /**
     * AddPhotoToFlyer constructor.
     * @param Flyer $flyer
     * @param UploadedFile $file
     */
    public function __construct(Flyer $flyer, UploadedFile $file)
    {
        $this->flyer = $flyer;
        $this->file = $file;
    }

    /**
     * Uploads the photo
     * saves the name
     * generates thumbnail
     */
    public function save()
    {
        return $this->flyer->addPhoto($this->makePhoto());
    }

    protected function makePhoto()
    {
        $photo = new Photo;
        $photo->path = $this->file->store(static::$baseDir, 'public');
        $photo->name = $this->file->getClientOriginalName();
        $photo->thumbnail_path = $this->thumb($photo);

        return $photo;
    }

    public function thumb($photo)
    {
        $thumbnail_path = static::$baseDir . "/tm-" . sha1($this->file->hashName() . time()) .'.'. $this->file->extension();
        $image = \Image::make(\Storage::disk('public')->get($photo->path))
            ->fit(200)
            ->stream();
        \Storage::disk('public')->put("{$thumbnail_path}", $image);
        return $thumbnail_path;
    }
}