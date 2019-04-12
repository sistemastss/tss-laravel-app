<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
class Helper
{
    public const RECORD_DELETED = "Record deleted successfully";
    /**
     * @param $array
     * @return array
     */
    public static function cleanArrayCollection($array)
    {
        $cleanCollect = [];
        foreach ($array as $item) {
            $cleanCollect[] = self::cleanArray($item);
        }
        return $cleanCollect;
    }
    /**
     * @param $array
     * @return array
     */
    public static function cleanArray($array)
    {
        return Arr::where($array, function ($value) {
            return $value !== null;
        });
    }
    /**
     * @param $value
     * @param $rules
     * @throws ValidationException
     */
    public static function validator($value, $rules)
    {
        $validation = Validator::make($value, $rules);
        if ($validation->fails()) {
            throw new ValidationException($validation);
        }
    }
    /**
     * @param $class
     */
    public static function throwModelNotFoud($class) {
        throw (new ModelNotFoundException())->setModel($class);
    }
    /**
     * @param $paginator
     * @return array
     */
    public static function paginator(LengthAwarePaginator $paginator) {
        return [
            'currentPage'  => $paginator->currentPage(),
            'lastPage'     => $paginator->lastPage(),
            'perPage'      => $paginator->perPage(),
            'firstItem'    => $paginator->firstItem(),
            'lastItem'     => $paginator->lastItem(),
            'total'        => $paginator->total(),
        ];
    }

    public static function uploadInformFile($file, $name) {
        if ($base64) {
            //get the base-64 from data
            $base64_str = substr($file, strpos($file, ",")+1);
            //decode base64 string
            $fl = base64_decode($base64_str);
            Storage::disk('local')->put($name, $fl);
            $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            //return $storagePath.'imgage.png';
            $url = Storage::url($name);
        }
    }

    public static function fileFromBlob(string $blob, $config = null)
    {
        //get the base-64 from data
        $base64_str = substr($blob, strpos($blob, ",") + 1);

        //decode base64 string
        $file = base64_decode($base64_str);

        return $file;
    }

    public static function saveFileUploaded(array $file)
    {
        $content = $file['content'];
        $path = $file['path'];
        $name = $file['name'];

        $success = Storage::disk('local')->put($path . $name, $content);

        if (!$success) {
            return false;
        }

        return true;

        // $path = public_path($filePath . $fileName);
        /*$nbytes = file_put_contents($path, $file);
        if  (!$nbytes) {
            return false;
        }

        return true;
        */
    }
}
