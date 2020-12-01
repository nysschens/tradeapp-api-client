<?php

namespace TradeApp\Tests;

use TradeApp\ApiClient;

class TestCase extends \PHPUnit_Framework_TestCase
{
    /** @var \TradeApp\ApiClient */
    protected $apiClient;

    /**
     * @var \Faker\Generator A Faker fake data generator.
     */
    protected $faker;

    /**
     * Sets up a test with some useful objects.
     */
    public function setUp()
    {
        $url = getenv('TradeApp_URL');
        if (!$url) {
            throw new \Exception('Environment variable TradeApp_URL is required');
        }
        $this->apiClient = new ApiClient($url);

        $this->faker = \Faker\Factory::create();
    }

    /**
     * Free resources.
     */
    public function tearDown()
    {
    }
}
