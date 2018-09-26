<?php

namespace Test\Unit\User;

use App\Address;
use App\User;
use PHPUnit\Framework\AssertionFailedError;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function testMorphOneHomeAddress()
    {
        factory(User::class)->create()->each(function (User $user) {

            // To make sure it doesn't return the delivery
            factory(Address::class)->create(['type' => 'delivery', 'user_id' => $user->id]);

            $attributes = [
                'type' => 'home',
                'street' => 'Sesame Street',
                'number' => 2,
                'suffix' => 'a',
                'city' => 'New York',
            ];

            tap(factory(Address::class)->create(\array_merge(['user_id' => $user->id], $attributes)), function (Address $address) use ($user, $attributes) {
                foreach ($attributes as $key => $value) {
                    try {
                        $this->assertEquals($value, $user->homeAddress->$key);
                    } catch (AssertionFailedError $exception) {
                        $this->fail("{$value} doesn't match {$user->homeAddress->$key}");
                    }

                }
            });
        });
    }
}
