<?php

namespace MMORPG\commands;

use MMORPG\Main;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;

class MMORPGPartyCommands extends PluginBase implements Listener {
    
    public $plugin;
    
    public function _construct(Main $plugin) {
        $this->plugin = $plugin;
        $this->server = $this->plugin->getServer();
    }
    public function getPlugin() {
        return $this->plugin;
    }
    public function getServer() {
        return $this->getServer();
    }
    public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
        switch($cmd->getName()){
            case "party":
                if(isset($args[0])){
                    switch(strtolower($args[0])){
                        case "invite":
                            $party = new Config ($this->getDataFolder () . "config" . $sender->getName () . ".yml");
                            $target = $this->getPlugin ()->getServer ()->getPlayer($args[1]);
                            if($target instanceof Player) {
                                $player->sendMessage(TF::GOLD . "You have sent a request!");
                                $target->sendMessage(TF::GOLD . "You have got a request from" . $player->getName());
                            } else {
                                $player->sendMessage("Player is not online");
                            }
                            return true;
                            break;
                    }
                }
        }
    }
}

