<?php

class Yeelight{

		protected $bulbIP;
		protected $bulbPort;
		protected $connErrNum;
		protected $connErrMsg;

		public function __construct($bulbIP, $bulbPort){
				$this->bulbIP = $bulbIP;
				$this->bulbPort = $bulbPort;
				if(!$this->testConnection($this->bulbIP, $this->bulbPort)){
					throw new Exception("Could not connect to the bulb, error ". $this->connErrNum. " : ".$this->connErrMsg );
				} else {
					echo "Successfully established a connection to ".$this->bulbIP;


				}

		}

		public function testConnection(){
				if(fsockopen($this->bulbIP, $this->bulbPort, $this->connErrNum, $this->connErrMsg)){
						return true;
				}
		
		}




}
