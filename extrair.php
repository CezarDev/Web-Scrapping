<?php
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';
$word = '12@';
$URL_LOGIN = 'http://helpdesk.sescms.com.br/otrs/index.pl?';
$pass = 'Janeiro';
$URL_TICKETS = 'http://helpdesk.sescms.com.br/otrs/index.pl?Action=AgentTicketStatusView';

$browser = new HttpBrowser(HttpClient::create());

$browser->request('GET', $URL_LOGIN);
//$browser->clickLink('Login');
$crawler = $browser->submitForm('Login', [
    'User' => 'cezaralves',
    'Password' => $pass . $word
], 'GET');


//var_dump($crawler->html());

$crawler = $browser->request('GET', $URL_TICKETS);

$a = $crawler->filter('div')->each(function($node) {
    return $node->text();
});

print_r($a);


$colunas = $crawler->filter('th')->each(function($node) {
    return $node->text();
});

$linhas = $crawler->filter('tr')->each(function($node) {
    return $node->text();
});

$span = $crawler->filter('span')->each(function($node) {
    return $node->text();
});

$td = $crawler->filter('div')->each(function($node) {
    return $node->text();
});



//print_r($linhas);

// $dados1 = $crawler->filter('tbody')->each(function($node) {
//     return $node->attr('thead');
// });

//$text = $crawler->filterXPath('tbody')->text();
//$dados =implode("", $dados)
//$node->attr('src')
//print_r($dados1);

// $crawler = $browser->request('GET', $URL_TICKETS);
// $crawler->filter('tbody')->each(function($node) use($dados) {
//     $dados .= $node->text() . PHP_EOL;
// });

// use Symfony\Component\DomCrawler\Crawler;
// // ...

// $nodeValues = $crawler->filter('p')->each(function (Crawler $node, $i) {
//     return $node->text();
// });




