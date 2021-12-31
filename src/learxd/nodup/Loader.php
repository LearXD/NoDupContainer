<?php

namespace learxd\nodup;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Loader extends PluginBase implements Listener {

    public function onEnable(){

        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getPluginManager()->registerEvents(new ContainerListener(), $this);

		$this->getServer()->getLogger()->info('§aNoDupContainer ON');
	}

}