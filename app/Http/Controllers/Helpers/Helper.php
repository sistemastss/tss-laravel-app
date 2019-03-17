<?php
/**
 * Created by PhpStorm.
 * User: crsrexx
 * Date: 28/01/19
 * Time: 11:41 PM
 */

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
        } else {

        }
    }
}