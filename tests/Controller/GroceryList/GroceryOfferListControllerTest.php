<?php


namespace App\Tests\Controller\GroceryList;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class GroceryOfferListControllerTest extends WebTestCase
{

    private $successAPI = '/offer/list';
    private $failureAPI = '/offer/wrongurl';
    private $filterType = 'Ascending';

    /**
     * Success Testing without passing Param
     */
    public function testOfferListWihoutParam() {
        $client = static::createClient();
        $client->request('GET', $this->successAPI);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * Success Testing with Param
     */
    public function testOfferListWithParam() {
        $client = static::createClient();
        $client->request('GET', $this->successAPI.'?filter='.$this->filterType);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * Failure Testing with invalid URL
     */
    public function testFailureOfferList()
    {
        $client = static::createClient();
        $client->request('GET', $this->failureAPI);
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }
}