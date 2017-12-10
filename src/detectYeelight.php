<?php


class detectYeelight{
	
		protected $headers = "M-SEARCH * HTTP/1.1\r\nHost: 239.255.255.250:1982\r\nMan:\"ssdp:discover\"\r\nST: wifi_bulb\r\n";
		protected $buff = null;
		protected $socket;
		protected $socketSendResponse;
		protected $tmp = null;

		public function searchDevices(){
				$this->socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
				socket_set_option($this->socket, SOL_SOCKET, SO_RCVTIMEO, array('sec'=> 15, 'usec'=>10000));
				var_dump($this->socketSendResponse = socket_sendto($this->socket, $this->headers, 1024, 0, '239.255.255.250', '1982'));

				# Wait for response
				while(@socket_recvfrom($this->socket, $this->buff, 1024, MSG_WAITALL, $this->tmp, $this->tmp)){
						$listtest = list($status, $St, $Location, $Opt, $N1s, $Server) = explode("\r\n", $this->buff);
						var_dump($listtest);
						        }
		socket_close($this->socket);
		}


}

