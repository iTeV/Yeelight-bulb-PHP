<?php

class yeelight{

		public function __construct($bulbIP, $bulbPort){
				if(empty($bulbIP) && empty($bulbPort)){
					throw new Exception("You cannot leave the bulb IP address and bulb port empty!");
				} else {
						if($this->testConnection($bulbIP, $bulbPort)){
								// TODO: Create testconnection function
						} else {
								throw new Exception("Could not connect to bulb"); #TODO: Add error output
						}
				}

		}




}
