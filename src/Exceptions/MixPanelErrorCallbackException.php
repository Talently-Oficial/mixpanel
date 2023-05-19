<?php

namespace MixPanel\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class MixPanelErrorCallbackException extends Exception
{
    public function __invoke(int $code, string $data): void
	{
        Log::error('Error durante la conexión con Mixpanel', [
            'code' => $code,
            'data' => $data,
        ]);
    }
}
