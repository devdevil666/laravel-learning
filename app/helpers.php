<?php

function flash($message)
{
    $flash = app(\App\Http\Flash::class);

    return $flash->message($message);
}

function flyer_path(\App\Flyer $flyer)
{
    return $flyer->zip . '/' . str_replace(' ', '-', $flyer->street);
}