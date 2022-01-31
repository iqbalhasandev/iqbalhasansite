<?php


// 'short_url' => preg_replace('#^https?://#', '', rtrim(env('APP_URL', 'http://localhost'), '/')),
return [
    'portfolio' => config('app.short_url'),
    'admin' => 'admin' . '.' . config('app.short_url'),
    'apps' => 'app' . '.' . config('app.short_url'),
    'telescope' => 'telescope' . '.' . config('app.short_url'),
    'bteb' => 'bteb' . '.' . config('app.short_url'),
];
