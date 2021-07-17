<?php

use Illuminate\Support\Facades\File;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use \Carbon\Carbon;
function createDate($date, $locale = 'id')
{
    try {
        return Carbon::parse($date)->locale($locale);
    } catch (\Exception $e) {
        return Carbon::now()->locale($locale);
    }
}

function formatDate($date, $isoFormat = "D MMMM Y")
{
    return $date->isoFormat($isoFormat);
}
function saveFile($model, $imageFile, $attributeName, $publicDirectoryName = null, $method = null)
{
    $isImage = getimagesize($imageFile);
    if(!$isImage) return false;
    try {
        $uploaded_image = $imageFile;
        $extension = $uploaded_image->getClientOriginalExtension();

        $destinationPath = public_path();
        if ($publicDirectoryName) {
            $destinationPath = $destinationPath . DIRECTORY_SEPARATOR . $publicDirectoryName;
        }

        $filenameOri = md5(microtime()) . '_ori.' . $extension;
        $filename = md5(microtime()) . '.' . $extension;




        $uploadpath = storage_path('/app/public/uploads/' . $publicDirectoryName);
        if (!is_dir($uploadpath)) {
            Storage::makeDirectory('/public/uploads/' . $publicDirectoryName);
        }

        Storage::disk("local")->putFileAs('/public/uploads/' . $publicDirectoryName,  $imageFile, $filename);
        Storage::disk("local")->putFileAs('/public/uploads/' . $publicDirectoryName,  $imageFile, $filenameOri);

        $model->$attributeName = $filename;

        if (!$method) {
            $model->save();
        } else if ($method == "update") {
            $model->update();
        }
        $data['message'] = "ok";
        $data['status'] = true;
    } catch (Throwable $e) {
        $data['message'] = $e->getMessage();
        $data['status'] = false;
    }
    return $data;
}
function deleteFile($fileName)
{
    try {
        if (File::exists($fileName)) {
            File::delete($fileName);
        }
        $data['message'] = "ok";
        $data['status'] = true;
    } catch (Throwable $e) {
        $data['message'] = $e->getMessage();
        $data['status'] = false;
    }
    return $data;
}

function updateFile($model, $imageFile, $attributeName, $publicDirectoryName = null)
{
    $isImage = getimagesize($imageFile);
    if(!$isImage) return false;
    try {
        $old_path = public_path() . DIRECTORY_SEPARATOR;

        $publicDirectoryName ? $old_filename = $old_path . $publicDirectoryName . DIRECTORY_SEPARATOR .
            $model->$attributeName : $old_filename = $old_path . $model->$attributeName;

        $isSave = saveFile($model, $imageFile, $attributeName, $publicDirectoryName, "update");
        if ($isSave && $isSave['status']) {
            deleteFile($old_filename);
        }
        $data['message'] = "ok";
        $data['status'] = true;
    } catch (Throwable $e) {
        $data['message'] = $e->getMessage();
        $data['status'] = false;
    }
    return $data;
}
function getImageUrl($image, $type = null)
{
    $path = url('/storage/uploads/img') . '/' . $image;
    $imageLocation = storage_path('app/public/uploads/img/' . $image);
    if (File::exists($imageLocation)) {
        return $path;
    }
    if ($type) {
        $path = url('/storage/uploads/img') . '/' . $type . '/' . $image;
        $imageLocation = storage_path('app/public/uploads/img/' . $type . '/' . $image);
    }
    if (File::exists($imageLocation)) {
        return $path;
    }
    return null;
}

function readCSV($csvFile, $array)
{
    $file_handle = fopen($csvFile, 'r');
    while (!feof($file_handle)) {
        $line_of_text[] = fgetcsv($file_handle, 0, $array['delimiter']);
    }
    fclose($file_handle);
    return $line_of_text;
}