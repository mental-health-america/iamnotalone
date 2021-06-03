<?php

namespace App\Http\Controllers\Misc;
use Illuminate\Support\Facades\Storage;

class FileHandler 
{

    /**
     * Upload a file to disk
     * 
     * @param string $path 
     * @param string $filename 
     * @param blob   $file 
     * 
     * @return boolean
     */
    public function uploadFile($path, $filename, $file)
    {
        return Storage::putFileAs('public/'.$path, $file, $filename);
    }

}
