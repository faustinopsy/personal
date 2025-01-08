<?php

namespace app\library;

class Lang
{
    private static array $translations = [];
    private static string $language = 'en';

    public static function setLanguage(string $lang)
    {
        self::$language = $lang;
        $path = dirname(__FILE__, 3) . "/app/lang/{$lang}.json";
        if (!file_exists($path)) {
            throw new \Exception("Arquivo de tradução não encontrado para o idioma: {$lang}");
        }

        self::$translations = json_decode(file_get_contents($path), true);
    }

    public static function get(string $key, string $default = '')
    {
        return self::$translations[$key] ?? $default;
    }
}
