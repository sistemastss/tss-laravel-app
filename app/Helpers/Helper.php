<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
class Helper
{
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
    public static function validator(array $value, $rules)
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
}
