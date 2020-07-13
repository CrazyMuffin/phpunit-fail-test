<?php

declare(strict_types=1);

namespace App\Entity;

use PHPUnit\Framework\TestCase;

class FooTest extends TestCase
{
    private static function getRandomLongArray(int $length): array
    {
        $array = array_fill(0, $length, 0);
        foreach ($array as $key => $item) {
            $array[$key] = md5(uniqid('', true));
        }
        return $array;
    }
    public function testDataPass()
    {
        $randomLongArray = self::getRandomLongArray(5000);

        $foo = new Foo($randomLongArray);

        $this->assertEquals(
            $randomLongArray,
            $foo->getData()
        );
    }

    public function testDataFail()
    {
        $randomLongArray = self::getRandomLongArray(5000);

        $foo = new Foo($randomLongArray);
        unset($randomLongArray[0]);

        $this->assertEquals(
            $randomLongArray,
            $foo->getData()
        );
    }

}
