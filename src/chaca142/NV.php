<?php

namespace chaca142;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class NV extends PluginBase implements Listener {

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("NVプラグインが読み込まれました");
    }

    public function onDisable() {
        $this->getLogger()->info("NVプラグインを停止しました");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args):bool {
        if($sender instanceof Player) {
            $player = $sender->getPlayer();
            if($player->hasEffect(16)) {
                $player->removeEffect(16);
                $player->sendMessage("§a暗視を消しました");
            }else{
                $player->addEffect(new EffectInstance(Effect::getEffect(16), 99999, 2, true));
                $player->sendMessage("§a暗視を付けました");
            }
        }else{
            $this->getLogger()->info("§cコンソールからの実行はできません");
        }
        return false;
    }
}
