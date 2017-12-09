<?php

class Yeelight{

		public function __construct($bulbIP, $bulbPort){
				if(!$this->testConnection($bulbIP, $bulbPort)){
					throw new Exception("Could not connect to the bulb!");
				} else {
						$this->bulbIP = $bulbIP;
						$this->bulbPort = $bulbPort;
				}

		}




}
