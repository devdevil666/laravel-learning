<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Photo;
use App\Service\AddPhotoToFlyer;
use Illuminate\Http\Request;
use App\Http\Requests\ChangeFlyerRequest;

class PhotosController extends Controller
{
    /**
     * AJAX saving the file from dropzone
     * @param $zip
     * @param $street
     * @param ChangeFlyerRequest|Request $request
     */
    public function store($zip, $street, ChangeFlyerRequest $request)
    {
        /** @var Flyer $flyer */
        $flyer = Flyer::locatedAt($zip, $street)
            ->first();
        $photo = request()->file('file');
        (new AddPhotoToFlyer($flyer, $photo))->save();
    }
}
