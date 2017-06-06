<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.home');
    }

    public function parser()
    {
        $projects = [];
        $client = new Client();
        // Go to the symfony.com website
        $crawler = $client->request('GET', 'http://payment.n-web.pp.ua');
       // $crawler = $client->click($crawler->selectLink('Sign in')->link());
        $form = $crawler->selectButton('Вход')->form();
        $crawler = $client->submit($form, [
            'data[User][email]' => 'hebesh88@yandex.ru',
            'data[User][password]' => '12121988']);
        $table = $crawler->filter('.table')->first();
        $table->filter('tr')->each(function (Crawler $node) use (&$projects) {

            if ($node->filter('td')->count()) {
                $projects[] = $node->filter('td')->first()->text();
            }
        });
//        $table = $table->html();
        /**
        $crawler->filter('.table')->first()->filter('tr')->each(function ($node) {
        print $node->html()."<br>";
        });
         */



        return view('pages.parser', compact( 'table', 'projects'));
    }
}
