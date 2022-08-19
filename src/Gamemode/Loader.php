<?php

namespace Gamemode;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;

use Gamemode\Command\GamemodeCommand;

class Loader extends PluginBase {

    public function onEnable(): void{ 
        $this->getServer()->getCommandMap()->register("gm", new GamemodeCommand());
        $this->getLogger()->info("Enabled");
    }
}