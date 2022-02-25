<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$browser = new HttpBrowser(HttpClient::create());

$crawler = $browser->request('GET', 'https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//');
$imagens = $crawler->filter('article .img-thumbnail')->images();

if (!is_dir('images')) {
    mkdir('images');
}

foreach ($imagens as $image) {
    $url = $image->getUri();
    $name = basename($url);
    file_put_contents('images/'.$name, $url);
}