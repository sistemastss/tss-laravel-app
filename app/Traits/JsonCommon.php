<?php
/**
 * Created by PhpStorm.
 * User: crsrexx
 * Date: 3/01/19
 * Time: 10:36 AM
 */

namespace App\Traits;

use App\Http\Controllers\Helpers\Helper;

trait JsonCommon
{

    private function jsonResponse($data, $code = 200)
    {
        return response()->json($data, $code);
    }

    protected function showMessage($message, $code) {
        return $this->jsonResponse(['message' => $message, 'code' => $code], $code);
    }

    protected function showAll($collection, $code = 200)
    {
        return $this->jsonResponse(['data' => $collection], $code);
    }

    protected function showPage($collection, $paginator, $code = 200)
    {
        return $this->jsonResponse(['data' => ['collection' => $collection, 'pagination' => Helper::paginator($paginator)]], $code);
    }

    protected function showOne($model, $code = 200)
    {
        return $this->jsonResponse(['data' => $model], $code);
    }

    protected function showError($error, $code = 400)
    {
        return $this->jsonResponse(['message' => $error, 'code' => $code], $code);
    }
}