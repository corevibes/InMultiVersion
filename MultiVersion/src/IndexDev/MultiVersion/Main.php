<?php

declare(strict_types=1);

namespace IndexDev\MultiVersion;

use IndexDev\MultiVersion\Listener\PlayerJoinListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase {
    use SingletonTrait;

    private Config $config;

    protected function onEnable(): void {
        self::setInstance($this);

        $this->loadConfiguration();

        $this->getServer()->getPluginManager()->registerEvents(new PlayerJoinListener(), $this);
        $this->getLogger()->info("MultiVersion plugin habilitado y listo.");
    }

    private function loadConfiguration(): void {
        $this->saveResource("config.json");
        $this->config = new Config($this->getDataFolder() . "config.json", Config::JSON);
    }

    public function getPluginConfig(): Config {
        return $this->config;
    }

    public function getSupportedProtocols(): array {
        return $this->config->get("protocols", []);
    }
}
