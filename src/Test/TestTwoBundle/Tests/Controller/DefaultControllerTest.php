<?php

namespace Test\TestTwoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {


        $this->assertGreaterThan(
            0,
            1
        );
    }
}
