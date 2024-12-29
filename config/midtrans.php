<?php

return [
    'merchant_id' => env('MIDTRANS_MERCHANT_ID'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'is_production' => env('MIDTRANS_PRODUCTION'),
    'is_sanitized' => env('MIDTRANS_SANITIZED'),
    'is_3ds' => env('MIDTRANS_3DS'),
];