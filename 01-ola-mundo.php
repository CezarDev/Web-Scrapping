<?php

use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$client = HttpClient::create();

$URL_OTRS = 'http://helpdesk.sescms.com.br/otrs/index.pl?Action=AgentTicketStatusView'; 

$request = $client->request('GET', $URL_OTRS);

$status = $request->getStatusCode();
$content = $request->getContent();
var_dump($content);