<?php

namespace Clicko\ReportErrors\Exceptions;

use Clicko\ReportErrors\Mail\SendErrorMail;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class Handler extends ExceptionHandler
{
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

    public function report(Throwable $e)
    {
        $errorTypes = [
            \ParseError::class => 'ParseError',
            \TypeError::class => 'TypeError',
            \ArgumentCountError::class => 'ArgumentCountError',
            \ErrorException::class => 'ErrorException',
            \Exception::class => 'Exception',
            \Error::class => 'Error',
            \AssertionError::class => 'AssertionError',
            \CompileError::class => 'CompileError',
        ];

        foreach ($errorTypes as $errorClass => $errorType) {
            if ($e instanceof $errorClass) {
                Log::error($errorType . ": " . $e->getMessage(), [
                    'exception' => $e,
                ]);
                $domain = request()->getHost();
                Mail::to(config('reporterrors.mail_to'))->send(new SendErrorMail($e, $domain));
                break;
            }
        }

        parent::report($e);
    }
}
