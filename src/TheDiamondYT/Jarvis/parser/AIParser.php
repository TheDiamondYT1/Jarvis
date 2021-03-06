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
    
    /**
     * @param Jarvis $plugin
     * @param array  $data
     */
    public function __construct(Jarvis $plugin, array $data) {
        $this->plugin = $plugin;   
        $this->version = $data["version"];   
        $this->data = $data["questions"];
    }
    
    /**
     * @return string
     */
    public function getVersion(): string {
        return $this->version;
    }
    
    /**
     * @param string $question
     * @return string
     */
    public function parse(string $question) {
        foreach($this->data as $id => $data) {
            if(strtolower($data["question"]) === strtolower($question)) {
                return $data["response"];
            }
        }
    }
}
