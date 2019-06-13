<?php
/**
 * Created by PhpStorm.
 * User: crsrexx
 * Date: 3/01/19
 * Time: 10:36 AM
 */

namespace App\Traits;

use App\Http\Controllers\Helpers\Helper;
use Illuminate\Http\Response;

trait JsonCommon
{

    private function jsonResponse($data, $code = 200)
    {
        return response()->json($data, $code);
    }

    protected function showAll($collection, $code = 200)
    {
        return $this->jsonResponse(['data' => $collection], $code);
    }

    protected function showOne($model, $code = 200)
    {
        return $this->jsonResponse(['data' => $model], $code);
    }

    protected function showError($error, $code = 400)
    {
        return $this->jsonResponse(['message' => $error, 'code' => $code], $code);
    }

    protected function showMessage($message, $code) {
        return $this->jsonResponse(['message' => $message, 'code' => $code], $code);
    }

    protected function created() {
        return $this->showMessage('datos creados con exito', Response::HTTP_CREATED);
    }

    protected function updated() {
        return $this->showMessage('datos actualizados con exito', Response::HTTP_ACCEPTED);
    }

    protected function deleted() {
        return $this->showMessage('datos eliminados con exito', Response::HTTP_ACCEPTED);
    }
}