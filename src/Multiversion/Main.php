<?php
namespace Multiversion;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\SingletonTrait as ST;
use Multiversion\Managers\ConfigManager;
use Multiversion\Listeners\JoinListener;

final class Main extends PluginBase
{
    use ST;

    protected function onEnable(): void
    {
        self::setInstance($this);
        $this->saveResource("config.json");
        $this->getServer()->getPluginManager()->registerEvents(new JoinListener(), $this);
        $this->getServer()->getCommandMap()->register("multiversion", new \Multiversion\Commands\ReloadCommand());

        ConfigManager::init();
    }
}