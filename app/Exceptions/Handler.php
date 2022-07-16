<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e): Response|JsonResponse|\Symfony\Component\HttpFoundation\Response
    {
        if ($e instanceof ModelNotFoundException) {
            return response()->json(['message' => 'Registro não encontrado.'], 404);
        }

        if ($e instanceof ValidationException) {
            return response()->json(['message' => 'Dados informado(s) inválido(s).', 'errors' => $e->validator->getMessageBag()], 422);
        }

        if ($e instanceof AuthorizationException) {
            return response()->json(['message' => $e->getMessage() ?? 'Autorização não concedida.'], 403);
        }

        if ($e instanceof AuthenticationException) {
            return response()->json(['message' => 'Você não está autenticado.'], 401);
        }

        if ($e instanceof ThrottleRequestsException) {
            return response()->json(['message' => 'Muitas requisições, tente mais tarde.'], 429);
        }

        return parent::render($request, $e);
    }
}
