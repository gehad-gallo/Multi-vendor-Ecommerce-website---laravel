<?php

namespace App\Traits;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

trait ImageUploadTrait
{
          public function uploadImage(Request $request, $inputName, $path) {
                    if ($request->hasFile($inputName)) {
                    $image = $request->file($inputName);

                    //delete old image if exists
                    if (File::exists(public_path($request->image))) {
                              File::delete(public_path($request->image));
                    }

                    $extension = $image->getClientOriginalExtension(); 
                    $fileName = Str::slug($inputName) . "-" . time() . '.' . $extension;

                    $image->move(public_path("uploads/{$path}/"), $fileName); 
                    return "/uploads/{$path}/{$fileName}";
                    }

                    return null; 
          }


          // Delete an old image file if it exists
          public function deleteImage(string $imagePath): void
          {
              $fullPath = public_path($imagePath);
              if (file_exists($fullPath)) {
                  unlink($fullPath);
              }
          }
}