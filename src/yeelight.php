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

		protected function testConnection(){
				if($this->socket = fsockopen($this->bulbIP, $this->bulbPort, $this->connErrNum, $this->connErrMsg)){
						return true;
				}
		
		} 

		public function action($actionArray){
				switch($actionArray){
					case strtolower($actionArray[0]) === "toggle":
							$this->msgArray = array('id' => 1, 'method' => 'toggle', 'params' => '[]');
							$this->run();
							break;
					
					case strtolower($actionArray[0]) === "bright":
							if(!is_numeric($actionArray[1])){
								throw new Exepction("Brightness level is not numeric!");
							} else {
									$this->msgArray = array('id' => 1, 'method' => 'set_bright', 'params' => '['.$actionArray[1].']');
									$this->run();

							}
							break;
				}


		}

		protected function run(){
				if(fwrite($this->socket, json_encode($this->msgArray). "\r\n")){
						echo "Executed successfully!";
						fclose($this->socket);
				} else {
					
				
				}




		}
}
