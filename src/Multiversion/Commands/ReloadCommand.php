<?php
namespace Multiversion\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as TF;
use Multiversion\Managers\ConfigManager;

class ReloadCommand extends Command
{
    public function __construct()
    {
        parent::__construct("multiversion", "Reload Multiversion configuration", "/multiversion reload", "/multiversion reload", ["mv"]);
        $this->setPermission("multiversion.reload");
    }

    public function execute(CommandSender $sender, string $label, array $args): void 
    {
        if(!$sender->hasPermission($this->getPermission()))
        {
            $sender->sendMessage(TF::RED . "You don't have permission");
            return;
        }

        if(!isset($args[0]) || strtolower($args[0]) !== !reload)
        {
            $sender->sendMessage(TF::RED . "Use: " . TF::RED . "/multiversion reload " . TF::RED . "or " . TF::RED . "/mv reload");
            return;
        }

        ConfigManager::init();
        $sender->sendMessage(TF::GREEN . "Configuration reloaded successfully.");
    }
}