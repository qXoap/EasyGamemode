<?php

namespace Gamemode\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as T;
use pocketmine\player\Player;
use function implode;
use pocketmine\player\GameMode;

class GamemodeCommand extends Command {

    public function __construct(){
        parent::__construct("gm", "Change Gamemode", null, []);
    }

    public function execute(CommandSender $pl, string $label, array $args){
        if($pl instanceof Player){
            if(!$pl->hasPermission("gamemode.cmd")){
                return false;
            }
            if(!isset($args[0])){
                $pl->sendMessage(T::RED."Use /gm [1:2:3]");
                return false;
            }
            $noExist = implode(" ", $args);
            switch(strtolower($args[0])){
                case 0:
                    $pl->setGamemode(GameMode::SURVIVAL());
                    $pl->sendMessage(T::GREEN."TU Modo De Juego Cambio a Supervivencia");
                break;
                case 1:
                    $pl->setGamemode(GameMode::CREATIVE());
                    $pl->sendMessage(T::GREEN."TU Modo De Juego Cambio a Creativo");
                break;
                case 2:
                    $pl->setGamemode(GameMode::ADVENTURE());
                    $pl->sendMessage(T::GREEN."TU Modo De Juego Cambio a Aventura");
                break;
                case 3:
                    $pl->setGamemode(GameMode::SPECTATOR());
                    $pl->sendMessage(T::GREEN."TU Modo De Juego Cambio a Espectador");
                break;

                default:
                $pl->sendMessage(T::RED."El Modo de Juego ".T::GREEN.$noExist.T::RED." No Existe");
            }
        }else{

        }
    }
}
