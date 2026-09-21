<?php

namespace App\Helpers;

class GlobalHelper
{
    public static function initials(?string $name): string
    {
        if (empty($name)) {
            return '';
        }

        return collect(preg_split('/\s+/', trim($name)))
            ->filter()
            ->map(fn ($word) => strtoupper(substr($word, 0, 1)))
            ->join('');
    }

    public static function formatRupiah($number): string
    {
        return 'Rp ' . number_format($number, 0, ',', '.');
    }

    public static function truncate(?string $text, int $limit = 50): string
    {
        if (empty($text)) {
            return '';
        }

        return strlen($text) > $limit
            ? substr($text, 0, $limit) . '...'
            : $text;
    }
}