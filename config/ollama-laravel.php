<?php

// Config for Cloudstudio/Ollama

/* return [
    'model' => env('OLLAMA_MODEL', 'llama2'),
    'url' => env('OLLAMA_URL', 'http://127.0.0.1:11434'),
    'default_prompt' => env('OLLAMA_DEFAULT_PROMPT', 'Hello, how can I assist you today?'),
    'connection' => [
        'timeout' => env('OLLAMA_CONNECTION_TIMEOUT', 300),
    ],
]; */

return [
    'model' => env('OLLAMA_MODEL', 'llama2'),
    'url' => env('OLLAMA_URL', 'http://127.0.0.1:11434'),
    'default_prompt' => env('OLLAMA_DEFAULT_PROMPT', 'Hello, how can I assist you today?'),
    'connection' => [
        'timeout' => env('OLLAMA_CONNECTION_TIMEOUT', 300),
        'verify_ssl' => env('OLLAMA_VERIFY_SSL', true),
        'auth' => [
            'type' => env('OLLAMA_AUTH_TYPE', null), // 'basic' or 'bearer'
            'username' => env('OLLAMA_AUTH_USERNAME', null),
            'password' => env('OLLAMA_AUTH_PASSWORD', null),
            'token' => env('OLLAMA_AUTH_TOKEN', null),
        ],
        'headers' => [
            // Add any custom headers here
            // 'X-Custom-Header' => 'value',
        ],
    ],
];
