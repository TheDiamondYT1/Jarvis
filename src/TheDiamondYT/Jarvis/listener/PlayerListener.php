<?php

/**   
 *       _                  _     
 *      | |                (_)    
 *      | | __ _ _ ____   ___ ___ 
 *  _   | |/ _` | '__\ \ / / / __|
 * | |__| | (_| | |   \ V /| \__ \
 *  \____/ \__,_|_|    \_/ |_|___/
 *                               
 *
 * An advanced PocketMine-MP chat bot created by TheDiamondYT.
 *
 * Twitter: @TheDiamondYT
 * Github: https://github.com/TheDiamondYT1/Jarvis
 */
 
namespace TheDiamondYT\Jarvis\listener;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
 
use TheDiamondYT\Jarvis\Jarvis;
 
class PlayerListener implements Listener {
    private $plugin;

    public function __construct(Jarvis $plugin) {
        $this->plugin = $plugin;
    }
    
    /**
     * @param PlayerChatEvent $event
     */
    public function onPlayerChat(PlayerChatEvent $event) {
        $player = $event->getPlayer();
        $message = $event->getMessage();
        $parsed = $this->plugin->getParser()->parse($message);
        
        $player->sendMessage($message);
    }
}
