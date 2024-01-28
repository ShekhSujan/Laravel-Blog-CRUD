<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;


trait UploadTrait
{

    public function uploadImage($image,  $savepath, $dimensions, $oldpath = null, $compress = 100)
    {
        if ($oldpath) {
            $this->deleteOldFileIfExists($oldpath);
        }
        $savepath = $savepath . time() . '_' . uniqid() . '.' . 'webp';
        $width = $dimensions[0] ?? 100;
        $height = $dimensions[1] ?? 100;
        $image = Image::make($image);
        $image->resize($width, $height)->encode('webp')->save($savepath, $compress);
        return $savepath;
    }

    public function uploadFile($file,  $path, $oldpath = null,)
    {

        if ($oldpath) {
            $this->deleteOldFileIfExists($oldpath);
        }
        $file_name = time() .'_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $fullpath = $path . $file_name;
        $file->move($path, $file_name);
        return $fullpath;
    }

    public function deleteOldFileIfExists($oldpath)
    {
        if ($oldpath && file_exists($oldpath)) {
            unlink($oldpath); // Delete the old image file
        }
    }
}
