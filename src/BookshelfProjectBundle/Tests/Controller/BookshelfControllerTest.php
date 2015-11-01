<?php

namespace BookshelfProjectBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BookshelfControllerTest extends WebTestCase
{
    public function testShowall()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAll');
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/show');
    }

    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Add');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Delete');
    }

}
