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
          


          public function updateImage(Request $request, $inputName, $path, $oldImagePath = null)
            {
                if ($request->hasFile($inputName)) {
                    $image = $request->file($inputName);

                    // Delete the old image if it exists
                    if ($oldImagePath && File::exists(public_path($oldImagePath))) {
                        File::delete(public_path($oldImagePath));
                    }

                    $extension = $image->getClientOriginalExtension();
                    $fileName = Str::slug($inputName) . "-" . time() . '.' . $extension;

                    $image->move(public_path("uploads/{$path}/"), $fileName);

                    return "/uploads/{$path}/{$fileName}";
                }

                // No new file uploaded; keep the old one
                return $oldImagePath;
            }


          public function deleteImage(string $imagePath): bool
            {
                $fullPath = public_path($imagePath);
                if (file_exists($fullPath)) {
                    return unlink($fullPath); // returns true if successful
                }
                return false;
            }
}