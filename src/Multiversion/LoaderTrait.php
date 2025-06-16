<?php
namespace Multiversion;

use pocketmine\utils\Config;

trait LoaderTrait
{
    public static function loadJson(string $file): array 
    {
        return json_decode(file_get_contents(Main::getInstance()->getDataFolder() . $file), true) ?? [];
    }
}