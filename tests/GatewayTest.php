<?php

namespace VendorName\Skeleton\Tests;

class GatewayTest extends TestCase
{
    /** @test */
    public function phone_number_can_be_set(): void
    {
        $this->assertSame('', $this->logGateway->getPhoneNumber());

        $this->logGateway->setPhoneNumber('123456789');

        $this->assertSame('123456789', $this->logGateway->getPhoneNumber());
    }

    /** @test */
    public function sender_name_can_be_set(): void
    {
        $this->assertNotNull($this->logGateway->getSenderName());

        $this->logGateway->setSenderName('123456789');

        $this->assertSame('123456789', $this->logGateway->getSenderName());
    }

    /** @test */
    public function message_can_be_set(): void
    {
        $this->assertSame('', $this->logGateway->getMessage());

        $this->logGateway->setMessage('Test Test');

        $this->assertSame('Test Test', $this->logGateway->getMessage());
    }
}
