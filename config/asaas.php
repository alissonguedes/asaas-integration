<?php

return [
	'production' => env('ASAAS_ENVIRONMENT', 'sandbox') !== 'sandbox',
	'version'    => env('ASAAS_VERSION', 'v3'),
	'url'        => config('asaas.production') ? 'https://api.asaas.com' : 'https://api-sandbox.asaas.com',
	'apiKey'     => config('asaas.production') ? env('ASAAS_API_KEY') : env('ASAAS_SB_API_KEY'),
];
