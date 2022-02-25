<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$browser = new HttpBrowser(HttpClient::create());

$crawler = $browser->request('GET', 'https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//');
$totalPaginas = $crawler->filter('header')->text();
$totalPaginas = preg_replace('/\D/', '', $totalPaginas);
$totalPaginas = ceil($totalPaginas/10);
$modelos = $crawler->filter('article')->each(function($node) {
    $return['modelo'] = $node->filter('.title')->text();
    $attributes = $node->filter('th')->each(function($attr) {
        return $attr->text();
    });
    $values = $node->filter('td')->each(function($attr) {
        return $attr->text();
    });
    $return = array_merge($return, array_combine($attributes, $values));
    return $return;
});

print_r($modelos);