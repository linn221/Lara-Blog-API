<?php

use Illuminate\Support\Facades\Storage;

function get_public_url(string $uri) : string
{
    return asset(Storage::url($uri));
}

function get_file_size(int $byte_size) : string
{
    // @refactor handle case for mega bytes
    $mega = 1000000;
    $kilo = 1000;
    $kb = $byte_size / $kilo;
    return "$kb kB";
}