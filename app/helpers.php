<?php

function flash($message)
{
    $flash = app(\App\Http\Flash::class);

    return $flash->message($message);
}