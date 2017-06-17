<?php

namespace App\Core;

class Locale
{
    const LOCALES = [
        'uk', 'en', 'ru', 'ach'
    ];

    const LOCALE_SUBDOMAINS = [
        'uk' => '',
        'en' => 'en',
        'ru' => 'ru',
        'ach' => 'translate'
    ];

    public static function validateAppLocale($code)
    {
        return in_array($code, self::LOCALES);
    }

    public static function getSubdomain($code)
    {
        if (!self::validateAppLocale($code))
        {
            throw new \Exception('Locale `' . $code . '` not found');
        }

        $subdomain = self::LOCALE_SUBDOMAINS[$code];

        if (mb_strlen($subdomain))
        {
            return sprintf('%s.%s', $subdomain, config('app.primary_domain'));
        }
        else
        {
            return config('app.primary_domain');
        }
    }
}