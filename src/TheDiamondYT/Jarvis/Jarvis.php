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
                  
namespace TheDiamondYT\Jarvis;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

use TheDiamondYT\Jarvis\parser\AIParser;

class Jarvis extends PluginBase {
    private static $instance;
    
    private $parser;
    
    private $language;
    
    /**
     * @return Jarvis
     */
    public static function getInstance() {
        return self::$instance;
    }
    
    public function onLoad() {
        self::$instance = $this;
        
        // Load language
        $this->language = new Config($this->getFile() . "resources/lang/en.json", Config::JSON);
    }

    public function onEnable() {
        $this->parser = new AIParser($this, json_decode(file_get_contents($this->getFile() . "resources/ai/default.json"), true));
    }
    
    /**
     * @return AIParser
     */
    public function getParser() {
        return $this->parser;
    }
    
    /**
     * @param array $data
     */
    public function registerResponse(array $data) {
        if(!isset($data["question"]) or !isset($data["response"])) {
            throw new \Exception("Tried to register question but missing required data");
        }
        $id = $data["id"] ?? mt_rand(5, 10000);
    }
    
    /**
     * Translate a message.
     *
     * @param string $text
     * @param array  $params
     *
     * @return string
     */
    public function translate(string $text, array $params = []): string {
        if(!empty($params)) {
            return vsprintf($this->language->getNested($text), $params);
        }
        return $this->language->getNested($text);
    }
}
