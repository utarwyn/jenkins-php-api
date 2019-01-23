<?php

use Utarwyn\Jenkins\Jenkins;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Exception\ConnectException;

class ConnectionTest extends TestCase
{
    private static $PUBLIC_SERVER_URL = 'https://builds.apache.org';

    public function testConnectToAPublicInstance(): void
    {
        $jenkins = new Jenkins(self::$PUBLIC_SERVER_URL);
        $this->assertContains('apache', $jenkins->getDescription());
        $this->assertContains('2.', $jenkins->getVersion());
    }

    public function testFailedIfBadUrl(): void
    {
        try {
            $jenkins = new Jenkins('bad_url');
            $this->fail('Bad urls do not generate an exception.');
        } catch (ConnectException $e) {
            $this->assertContains('Could not resolve host', $e->getMessage());
        }
    }
}
