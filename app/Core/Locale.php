<?php

namespace App\Core;

class Locale
{

    const APP_LANGUAGES = [
        'uk', 'en', 'ru'
    ];

    public static function validateAppLocale($languageCode)
    {
        return in_array($languageCode, self::APP_LANGUAGES);
    }

}