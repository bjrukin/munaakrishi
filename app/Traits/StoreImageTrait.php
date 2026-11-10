<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
trait StoreImageTrait {

    //$folder = '/folder_name/'
    public function StoreImage(UploadedFile $file, $file_name, $folder, $disk = 'public') {
        $fileName = $file_name . '.' . $file->getClientOriginalExtension();
        $file->storeAs($folder, $fileName, $disk);
        return $fileName;
    }

    public function StoreResizeImage(UploadedFile $file, $file_name, $folder, $width, $height, $disk = 'public') {
        $fileName = $file_name . '.' . $file->getClientOriginalExtension();
        $img = Image::make($file->getRealPath());
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk($disk)->put($folder . $fileName, $img);
        return $fileName;
    }

    public function StoreResizeImageWithThumb(UploadedFile $file, $file_name, $folder, $width, $height, $thumb_width, $thumb_height, $disk = 'public') {
        $fileName = $file_name . '.' . $file->getClientOriginalExtension();
        $img = Image::make($file->getRealPath());
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk($disk)->put($folder . $fileName, $img);
        //for thumb
        $img = Image::make($file->getRealPath());
        $img->resize($thumb_width, $thumb_height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk($disk)->put($folder . 'thumb/' . $fileName, $img);
        return $fileName;
    }

    public function StoreBase64Image($file, $folder, $file_name, $disk = 'public') {
        $mime = substr($file, 5, strpos($file, ';') - 5);
        $extension = explode('/', $mime)[1];
        $filename = $file_name . '.webp';
        if ($extension == 'svg') {
            $base64_string = str_replace('data:image/svg+xml;base64', '', $file);
            $image = base64_decode($base64_string);
        } else {
            $image = Image::make($file)->encode('webp', 90);
        }
        Storage::disk($disk)->put($folder . $filename, $image);
        return $filename;
    }

    public function StoreBase64ImageWithThumb($file, $folder, $file_name, $thumb_width, $thumb_height, $disk = 'public') {
        $mime = substr($file, 5, strpos($file, ';') - 5);
        $extension = explode('/', $mime)[1];
        $filename = $file_name . '.webp';
        if ($extension == 'svg') {
            $base64_string = str_replace('data:image/svg+xml;base64', '', $file);
            $image = base64_decode($base64_string);
        } else {
            $image = Image::make($file)->encode('webp', 90);
            $thumb_image = Image::make($file)->resize($thumb_width, $thumb_height, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('webp', 90);
            Storage::disk($disk)->put($folder . 'thumb/' . $filename, $thumb_image);
        }
        Storage::disk($disk)->put($folder . $filename, $image);
        return $filename;
    }

    public function StoreBase64File($file, $folder, $disk = 'public') {
        $mime = substr($file, 5, strpos($file, ';') - 5);
        $ext = explode('/', $mime)[1];
        $filename = Str::uuid() . '.' . $ext;
        if ($ext == 'pdf') {
            $base64_string = str_replace('data:application/pdf;base64', '', $file);
            $file = base64_decode($base64_string);
        }
        Storage::disk($disk)->put($folder . $filename, $file);
        return $filename;
    }
}