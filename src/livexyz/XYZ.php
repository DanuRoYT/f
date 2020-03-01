<?php

namespace livexyz;

use pocketmine\scheduler\Task;
use pocketmine\Server;

class XYZ extends Task {
	
	protected $main;
	
	public function __construct(Main $main){
		$this->main = $main;
	}
	
	public function onRun(int $currentTick){
		foreach($this->main->getServer()->getOnlinePlayers() as $player){
			$player->sendPopup("§a" . (int)$player->getX() . " " . (int)$player->getY() . " " . (int)$player->getZ());
		}
	}
	
}