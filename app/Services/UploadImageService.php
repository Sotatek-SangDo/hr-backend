<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UploadImageService
{
    public function upload(Request $request)
    {
        $file = $request->file;
        if (is_file($file)) {
            $fileName = str_replace(".", "", microtime(true)) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($fileName, File::get($file));
            return Storage::disk('public')->url($fileName);
        }
        return false;
    }
}
