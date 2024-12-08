<?php

declare(strict_types=1);

namespace IndexDev\MultiVersion\Listener;

use IndexDev\MultiVersion\Main;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerPreLoginEvent;

class PlayerJoinListener implements Listener {

    public function onPreLogin(PlayerPreLoginEvent $event): void {
        $playerInfo = $ev->getPlayerInfo();
        $protocol = $playerInfo->getProtocolVersion();
        $supportedProtocols = Main::getInstance()->getSupportedProtocols();

        if (!in_array($protocol, $supportedProtocols, true)) {
            $ev->setKickMessage(Main::getInstance()->getPluginConfig()->get("kickMessage", "Tu versión no es compatible con este servidor."));
            $ev->cancel();
        }
    }

    public function onPlayerJoin(PlayerJoinEvent $event): void {
        $player = $ev->getPlayer();
        $deviceInfo = $player->getPlayerInfo()->getExtraData();
        $clientVersion = $deviceInfo["GameVersion"] ?? "Desconocida";

        $message = Main::getInstance()->getPluginConfig()->get("joinMessage", "¡Bienvenido al servidor!");
        $player->sendMessage(str_replace("{version}", $clientVersion, $message));
    }
}
