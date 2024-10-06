<?php
namespace App\Helpers;
class FileHelper
{
    public static function uploadFile($data, $path)
    {
        $storedFile = $data->store($path);
        return $storedFile;
    }
}