<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_check_if_data_is_present()
    {
        $collect = new \App\Support\Collection([   //passing data of array
            23, 24, 50
        ]);

        $this->assertNotEmpty($collect->getData());
    }
}
