<?php
    /**
     * Loads the json objects and returns specific sorted arrays
     *
     * @author 1Rogue
     */
    class JSONManager {
        
        private $streams = array();
        private $donators = array();

        public function __construct($name) {
            $site = json_decode(file_get_contents("$name.json"), true);
            $this->streams = $site["streams"];
            $this->donators = $site["donators"];
            array_multisort(array_keys($this->streams), SORT_NATURAL | SORT_FLAG_CASE , $this->streams);
            arsort($this->donators);
        }

        public function getStreams() {
            return $this->streams;
        }

        public function getDonators() {
            return $this->donators;
        }
    }
?>