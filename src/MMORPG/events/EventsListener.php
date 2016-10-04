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
    public function onHit(EntityDamageEvent $event) {
        if($event instanceof EntityDamageByEntityEvent) {
            $fight = $event->getEntity();
            $damager = $event->getDamager();
            if($fight instanceof Player && $damager instanceof Player) {
                if($damager->getItemInHand()->getId() == Item::STICK) {
                    if($damager->hasPermission("class.hero")) {
                        if ($damager->getFood() >= 1) {
                            $x = $hit->x;
                            $y = $hit->y;
                            $z = $hit->z;
                            $event->setKnockBack(0.9);
                            $event->setDamage(0.5);
                            $level->addParticle(new CriticalParticle(new Vector3($x, $y, $z)), 5);
                            $player->sendTip(TF::RED . "Oh mighty Hero!");
                        }
                    }
                }elseif($damager->getItemInHand()->getId() == Item::SWORD) {
                    if($damager->hasPermission("class.villain")) {
                        if($damager->getFood () >= 1) {
                            $x = $hit->x;
                            $y = $hit->y;
                            $z = $hit->z;
                            $event->setKnockBack(0.6);
                            $fight->setOnFire(5);
                            $damager->sendPopup(TF::AQUA . "The VILLAIN has awakened!");
                        }
                    }
            }
          }   
        }
    }


