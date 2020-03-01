<?php

namespace livexyz;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\scheduler\TaskScheduler;
use livexyz\XYZ;
use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener {
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {
		
		switch($cmd->getName()){
			case "xyz":
			if(!($sender->hasPermission("danuroyt.livexyz"))){
				$sender->sendMessage("§cYou don't have permission");
				return true;
			}
			if(!(isset($args[0]))){
				$sender->sendMessage("Usage: /xyz on/off");
				return true;
			}
			if($args[0] === "on"){
				$this->getScheduler()->scheduleRepeatingTask(new XYZ($this), 1);
				return true;
			}elseif($args[0] === "off"){
				$this->getScheduler()->cancelTask(1);
				return true;
			}
			break;
		}
		
		return true;
	}
	
	
}