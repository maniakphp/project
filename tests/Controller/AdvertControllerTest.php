<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdvertControllerTest extends WebTestCase
{
    public function testSomething()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertCount(
            1,
            $crawler->filter('nav'),
            'The homepage displays the right number of posts.'
        );
//        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('html:contains("Search")')->count());
//        $this->assertSame(1, $crawler->filter('html:contains("Kategorie")')->count());
    }
}
