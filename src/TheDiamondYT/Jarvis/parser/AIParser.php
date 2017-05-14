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

namespace TheDiamondYT\Jarvis\parser;

use TheDiamondYT\Jarvis\Jarvis;

class AIParser {
    private $plugin;
    private $version;
    private $data = [];

    public function __construct(Jarvis $plugin, array $data) {
        $this->plugin = $plugin;   
        $this->version = $data["version"];   
        $this->data = $data["questions"];
    }
    
    /**
     * @param string $question
     */
    public function parse(string $question) {
        foreach($this->data as $id => $data) {
            
        }
    }
}
