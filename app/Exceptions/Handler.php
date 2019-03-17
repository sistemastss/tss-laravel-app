<?php

namespace App\Exceptions;

use App\Traits\JsonCommon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{

    use JsonCommon;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     * @throws
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return $this->handleException($request, $exception);
    }

    public function handleException($request, Exception $exception)
    {

        if ($exception instanceof ModelNotFoundException) {
            $model = strtolower(class_basename($exception->getModel()));
            return $this->showError("An instance for {$model} was not found", Response::HTTP_NOT_FOUND);
        }


        if ($exception instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($exception, $request);
        }


        if ($exception instanceof AuthenticationException) {
            return $this->unauthenticated($request, $exception);
        }


        if ($exception instanceof AuthorizationException) {
            return $this->showError('You do not have permissions to execute this action', Response::HTTP_FORBIDDEN);
        }


        if ($exception instanceof NotFoundHttpException) {
            return $this->showError('URL not found', Response::HTTP_NOT_FOUND);
        }


        if ($exception instanceof MethodNotAllowedHttpException) {
            return $this->showError('The method specified in the request is not valid', Response::HTTP_METHOD_NOT_ALLOWED);
        }


        if ($exception instanceof HttpException) {
            return $this->showError($exception->getMessage(), $exception->getStatusCode());
        }


        if ($exception instanceof QueryException) {
            $codigo = $exception->errorInfo[1];
            if ($codigo == 1451) {
                return $this->showError('You can not delete the resource permanently because it is related to another', Response::HTTP_CONFLICT);
            }
        }


        if ($exception instanceof TokenMismatchException) {
            return redirect()->back()->withInput($request->input());
        }


        if ($exception instanceof ModelNotUpdateException) {
            return $this->showError('Must update at least one record', Response::HTTP_UNPROCESSABLE_ENTITY);
        }


        if ($exception instanceof ModelHasOneRecordExeption) {
            return $this->showError('There is a resource associated with this record', Response::HTTP_CONFLICT);
        }


        if (config('app.debug')) {
            return parent::render($request, $exception);
        }


        return $this->showError('Unexpected failure Try again later', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        $errors = $e->validator->errors()->getMessages();

        return $this->showError($errors, Response::HTTP_UNPROCESSABLE_ENTITY);

    }
}
