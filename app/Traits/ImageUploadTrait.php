<?php
namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait ImageUploadTrait
{
    //khai bao tham tri inputName la ten cua cot trong database, path la luu duong dan
    public function UploadImage(Request $request, $inputName, $path)
    {
        //kiem tra xem co input nao co type la file khong sau do lay name cua no
        if ($request->hasFile($inputName)) {

            $image = $request->{$inputName};//
            $ext = $image->getClienOriginalExtenstion();        // de lay ten anh
            $imageName = 'image_' . uniqid() . '.' . $ext;
            $image->move(public_path($path), $imageName);
            return $path . '/' . $imageName;
        }

    }

    public function UploadMultiImage(Request $request, $inputName, $path)
    {
        $imagePaths = [];
        //kiem tra xem co input nao co type la file khong sau do lay name cua no
        if ($request->hasFile($inputName)) {

            $images = $request->{$inputName};

            foreach ($images as $image) {
                $ext = $image->getClienOriginalExtenstion();        // de lay ten anh
                $imageName = 'image_' . uniqid() . '.' . $ext;
                $image->move(public_path($path), $imageName);
                $imagePaths[] = $path . '/' . $imageName;
            }
            return $imagePaths;
        }
    }
}
