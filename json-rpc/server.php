<?php

require_once 'jsonRPCServer.php';

require 'fnc.php';

$fnc = new fnc();
jsonRPCServer::handle($fnc) 
	or print 'no request';
?>