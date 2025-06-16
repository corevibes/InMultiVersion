<?php
namespace Multiversion\Data;

use pocketmine\utils\TextFormat as TF;

final class StatsManager
{
    private static array $versionCounts = [];

    public static function add(string $version): void 
    {
        self::$versionCounts[$version] = (self::$versionCounts[$version] ?? 0) + 1;
    }

    public static function log(): void 
    {
        echo TF::GRAY . "[Multiversion] Connections by version:" . PHP_EOL;
        foreach(self::$version => $count)
        {
            echo TF::GREEN . " - " . TF::GREEN . $version . ": " . TF::GREEN . $count . PHP_EOL;
        }
    }
}