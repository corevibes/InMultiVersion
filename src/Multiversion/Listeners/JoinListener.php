<?php
namespace Multiversion\Listeners;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\utils\TextFormat as TF;
use Multiversion\Managers\ConfigManager;

final class JoinListener implements Listener 
{
    public function onLogin(PlayerLoginEvent $ev): void 
    {
        $player = $ev->getPlayer();
        $info = $player->getPlayerInfo()->getExtraData();

        $clientVersion = $info["GameVersion"] ?? "unknown";

        StatsManager::add($clientVersion);

        Main::getInstance()->getLogger()->info(
            TF::GRAY . "[Multiversion] " . 
            TF::YELLOW . $player->getName() . 
            TF::WHITE . " use the version " . 
            TF::BLUE . $clientVersion
        );

        if(!in_array($clientVersion, ConfigManager::getAllowedVersions()))
        {
            $player->kick(ConfigManager::getKickMessage(), false);
        } else {
            StatsManager::log();
        }
    }
}