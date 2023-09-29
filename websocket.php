<?php
require 'vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class MyWebSocket implements MessageComponentInterface { 
	public $clients;
	private $connectedClients;
	
    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->connectedClients = [];
    }
	
	public function onOpen(ConnectionInterface $conn) { 
		$this->clients->attach($conn);
		$this->connectedClients[$conn->resourceId] = $conn;
		echo "Nova Conexão! ({$conn->resourceId})\n";
		$conn->send("Bem Vindo ao Servidor.");
	}
	
	public function onMessage(ConnectionInterface $from, $msg) { 
		//echo $msg . "\n";
		foreach ($this->connectedClients as $client) { 
			$client->send($msg);
		}
	}
	
	public function onClose(ConnectionInterface $conn) { 
		// 
        $this->clients->detach($conn);
        unset($this->connectedClients[$conn->resourceId]);
	}
	
	public function onError(ConnectionInterface $conn, \Exception $e) { 
		echo "An error occurred: " . $e->getMessage() . "\n";
		$conn->close();
	}
}

//
$app = new Ratchet\App("192.168.0.96", 81, "0.0.0.0"); //localhost
$app->route('/', new MyWebSocket, array('*'));

$app->run();
?>
























