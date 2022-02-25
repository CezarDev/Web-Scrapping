<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$URL_OTRS = 'http://helpdesk.sescms.com.br/otrs/index.pl?Action=AgentTicketStatusView'; 

$browser = new HttpBrowser(HttpClient::create());

$crawler = $browser->request('GET', $URL_OTRS);
$nomes = $crawler->filter('title')->each(function($node) {
    return $node->text();
});

print_r($nomes);
