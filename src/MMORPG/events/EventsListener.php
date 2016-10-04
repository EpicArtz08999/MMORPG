<?php

namespace MMORPG\events;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityRegainHealthEvent;

class EventsListener implements Listener {
    
    private $plugin;
    
    public function _construct(Main $plugin) {
        $this->plugin = $plugin;
        $this->server = $plugin->getServer();
    }
    
    public function getServer() {
        return $this->getServer();
    }
    
    public function getPlugin() {
        return $this->plugin;
    }
    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $player->sendMessage(TF::GOLD . "Welcome to" . Main::PREFIX . $player->getName());
    }
    public function onDeath(PlayerDeathEvent $event) {
        $player = $event->getEntity();
        $cause = $player->getLastDamageCause();
        $event->setDeathMessage(null); // I'll work on death messages later
    }

}


