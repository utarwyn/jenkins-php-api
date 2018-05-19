<?php

use PHPUnit\Framework\TestCase;

class MyFirstTest extends TestCase
{
    public function testYouShouldNotPass(): void
    {
        $this->assertNotFalse(true, 'This is not false! :(');
    }
}
