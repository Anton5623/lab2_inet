<?php

return [
    'title' => env('LAB_TITLE', 'Сертифікаційні іспити'),
    'student' => env('LAB_STUDENT', 'Unknown Student'),
    'variant' => (int) env('LAB_VARIANT', 72),
    'route_prefix' => env('LAB_ROUTE_PREFIX', 'certifications'),
    'check_code' => env('LAB_CHECK_CODE', 'not-set'),
    'coefficient' => (int) env('LAB_COEFFICIENT', 5),
];
