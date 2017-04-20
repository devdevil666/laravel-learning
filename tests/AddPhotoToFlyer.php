<?php

namespace App\Service;


use App\Flyer;
use Illuminate\Http\UploadedFile;
use App\Service\AddPhotoToFlyer;
use Tests\TestCase;

class AddPhotoToFlyerTest extends TestCase
{
    function it_tests_all()
    {
        $flyer = factory(Flyer::class)->create();
        $file = \Mockery::mock(UploadedFile::class, [
            'getClientOriginalName' => 'foo',
            'extension' => 'jpg',
        ]);

        $file->shouldReceive('move')->once()->with('photos', 'nowfoo.jpg');

        $form = new AddPhotoToFlyer($flyer, $file);

        $form->save();

        $this->assertEquals(1, $flyer->photos);
    }
}

function time()
{
    return 'now';
}