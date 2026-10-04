<?php

return [
    'title' => env('LAB_TITLE', 'Стипендіальні програми'),
    'student' => env('LAB_STUDENT', 'Anton'),
    'variant' => (int) env('LAB_VARIANT', 73),
    'route_prefix' => env('LAB_ROUTE_PREFIX', 'scholarships'),
    'check_code' => env('LAB_CHECK_CODE', 'lab-check-2026'),
    'coefficient' => (int) env('LAB_COEFFICIENT', 5),
    'title_max' => (int) env('LAB_TITLE_MAX', 100),
    'notes_min' => (int) env('LAB_NOTES_MIN', 30),
    'js_threshold' => (int) env('LAB_JS_THRESHOLD', 15),
];
