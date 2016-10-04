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
                switch(strtolower($args[0])){
                case "start":
                    switch(strtolower($args[1])) {
                    case "hero":
                        if($sender->hasPermission("class.chosen")) {
                            $player->sendMessage(TF::RED . "You have already chosen a class");
                    } else {
                        $player->sendMessage(TF::GOLD . "You have joined the Realm as a" . TF::AQUA . "Hero");
                        $player->sendMessage(TF::GREEN . "As a Wizard, you will recieve various items!");
                        $weapon = Item::get(Item::STICK, 0, 1);
                        $p->getInventory()->addItem($weapon);
                        $this->getOwner()->getServer()->dispatchCommand(new ConsoleCommandSender(), "setuperm " . $sender->getName() . " class.chosen");
                        $this->getOwner()->getServer()->dispatchCommand(new ConsoleCommandSender(), "setuperm " . $sender->getName() . " class.hero");
                    }
                    return true;
                    break;
                    
                    case "villain":
                        if($sender->hasPermission("class.chosen")) {
                            $player->sendMessage(TF::RED . "You have chosen a Class already");
                        } else {
                            $p->sendMessage(TF:: AQUA . "You have joined the world as a VillaiN!!");
                            $sword = Item::get(Item::IRON_SWORD, 0, 1);
                            $p->getInventory()->addItem($sword);
                            $this->getOwner()->getServer()->dispatchCommand(new ConsoleCommandSender(), "setuperm " . $sender->getName() . " class.chosen");
                            $this->getOwner()->getServer()->dispatchCommand(new ConsoleCommandSender(), "setuperm " . $sender->getName() . " class.villain");
                            return true;
                            break;
                        }
                        break;
                    case "warp":
                        if($sender->hasPermission("class.chosen")){
                            $player->sendMessage(TF::BLUE . "You have been teleported to the Realms!");
                            $p->teleport($this->getOwner()->getServer()->getLevelByName($this->getOwner()->config->get("world"))->getSafeSpawn());
                        } else {
                            $player->sendMessage(TF::AQUA . "You have yet to choose a Class!");
                        }
                }
        }
    }
}


