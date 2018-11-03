<?php

namespace chaca142;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\EffectInstance;
use pocketmine\entity\Effect;
use pocketmine\Player;
use pocketmine\Server;

class NV extends PluginBase implements Listener{

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("§aNVを読み込みました");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args):bool {

        if($sender instanceof Player){
            $player = $sender->getPlayer();
            if($player->hasEffect(16)){
                $player->removeEffect(16);
                $player->sendMessage("§aエフェクトを消しました");
            }else{
                $player->addEffect(new EffectInstance(Effect::getEffect(16), 99999, 2, true));
                $player->sendMessage("§aエフェクトを付けました");
            }
        }else{
            $this->getLogger()->info("§cコンソールからの実行はできません");
        }
     return false;
    }
}