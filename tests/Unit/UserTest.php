<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase 
{

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = new User;

    }

    public function testGetEmail(): void
    {
        $value = 'test@test.fr';

        $response= $this->user->setEmail($value);

        $getEmail= $this->user->getEmail();

        self::assertInstanceOf(User::class, $response);
        self::assertEquals($value, $getEmail);

    }

    
}

?>