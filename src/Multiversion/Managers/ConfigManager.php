<?php
namespace Multiversion\Managers;

use Multiversion\LoaderTrait;

final class ConfigManager
{
    use LoaderTrait;

    public static array $config;

    public static function init(): void 
    {
        self::$config = self::loadJson("config.json");
    }

    public static function getAllowedVersions(): array 
    {
        return self::$config["allowed_versions"] ?? [];
    }

    public static function getKickMessage(): string 
    {
        return self::$config["kick_message"] ?? "Unsupported version";
    }
}