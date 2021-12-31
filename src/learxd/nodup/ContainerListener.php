<?php

namespace learxd\nodup;

use pocketmine\block\Block;
use pocketmine\event\Listener;

class ContainerListener implements Listener {

    /**
     * @param \pocketmine\event\block\BlockBreakEvent $event
     * @return bool
     */
    public function break (\pocketmine\event\block\BlockBreakEvent $event): bool
    {

        $player = $event->getPlayer(); $block = $event->getBlock();

        $tile = $block->getLevel()->getTile($block);

        if($tile instanceof \pocketmine\tile\Chest){

            if(isset($tile->namedtag['pairx']) or isset($tile->namedtag['pairz'])) {
                if($tile->getDoubleInventory()) {
                    foreach ($tile->getDoubleInventory()->getContents() as $content) {
                        if($content->getId() != Block::AIR){
                            $event->setCancelled(true);
                            return $player->sendMessage('§cVoce nao pode quebrar esse baú duplo pois ha itens dentro! Remova todos para isso!');
                        }
                    }
                }
            } else {
                if (count($tile->getInventory()->getContents()) > 0) {
                    $event->setCancelled(true);
                    return $player->sendMessage('§cVoce nao pode quebrar esse baú pois ha itens dentro! Remova todos para isso!');
                }
            }
        } elseif($tile instanceof \pocketmine\tile\BrewingStand){
            if(count($tile->getInventory()->getContents()) > 0){
                $event->setCancelled(true);
                return $player->sendMessage('§cVoce nao pode quebrar esse Suporte de Poções pois ha itens dentro! Remova todos para isso!');
            }
        } elseif($tile instanceof \pocketmine\tile\Dispenser){
            if(count($tile->getInventory()->getContents()) > 0){
                $event->setCancelled(true);
                return $player->sendMessage('§cVoce nao pode quebrar esse Dispenser pois ha itens dentro! Remova todos para isso!');
            }
        } elseif($tile instanceof \pocketmine\tile\Dropper){
            if(count($tile->getInventory()->getContents()) > 0){
                $event->setCancelled(true);
                return $player->sendMessage('§cVoce nao pode quebrar esse Dropper pois ha itens dentro! Remova todos para isso!');
            }
        } elseif($tile instanceof \pocketmine\tile\EnchantTable){
            if(count($tile->getInventory()->getContents()) > 0){
                $event->setCancelled(true);
                return $player->sendMessage('§cVoce nao pode quebrar essa Enchant Table pois ha itens dentro! Remova todos para isso!');
            }
        } elseif($tile instanceof \pocketmine\tile\Furnace){
            if(count($tile->getInventory()->getContents()) > 0){
                $event->setCancelled(true);
                return $player->sendMessage('§cVoce nao pode quebrar essa Fornalha pois ha itens dentro! Remova todos para isso!');
            }
        } elseif($tile instanceof \pocketmine\tile\Hopper){
            if(count($tile->getInventory()->getContents()) > 0){
                $event->setCancelled(true);
                return $player->sendMessage('§cVoce nao pode quebrar esse Hopper pois ha itens dentro! Remova todos para isso!');
            }
        }
        return true;
    }
}