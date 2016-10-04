<?php

namespace MMORPG;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;
use pocketmine\level\Position;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener {
    
    const PREFIX = TF::GRAY."[".TF::GOLD."VainGloryPE".TF::GRAY."]".TF::WHITE;
    public $teams = array();
    
    public function onEnable(){
        mkdir($this->getDataFolder());
        $this->config = new Config($this->getDataFolder(). "config.yml", Config::YAML, ["Team-enabled" => false, "team-size" => 2]);
        $this->getServer()->getLogger()->info(self::PREFIX."Enabled!");
    }
    public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
        switch($command->getName()){
            case "class":
                if(!isset($args[0])) {
                    $player->sendMessage(TF::RED . "Usage: /class hero <type>");
                }
                if($args[0] == "hero"){
                    $player->sendMessage("You are now a hero!");
                }
                if($args[0] == "villain"){
                    $player->sendMessage("You are a Villian!");
                }
        }
    }
}


