<?php

namespace Prob\ArrayUtil;

use PHPUnit_Framework_TestCase;

class KeyGlueTest extends PHPUnit_Framework_TestCase
{

    public function testKeyGlue1()
    {
        $glue = new KeyGlue();
        $glue->setArray($this->getTestArray());
        $glue->setGlueCharacter('.');

        $this->assertEquals([
            'a.a',
            'a.b',
            'a.c.a',
            'a.c.b',
            'a.c.c.a',
            'a.c.c.b.a',
            'a.c.c.c.a',
            'a.d.a',
            'b.a'
        ], $glue->glue());
    }

    public function testKeyGlue1WithValue()
    {
        $glue = new KeyGlue();
        $glue->setArray($this->getTestArray());
        $glue->setGlueCharacter('.');
        $glue->setWithValue(true);

        $this->assertEquals([
            'a.a' => 'Test1',
            'a.b' => 'Test2',
            'a.c.a' => 'Test3',
            'a.c.b' => 'Test4',
            'a.c.c.a' => 'Test5',
            'a.c.c.b.a' => 'Test6',
            'a.c.c.c.a' => 'Test7',
            'a.d.a' => 'Test8',
            'b.a' => 'Test9'
        ], $glue->glue());
    }

    public function testKeyGlue2()
    {
        $glue = new KeyGlue();
        $glue->setArray($this->getTestArray());
        $glue->setGlueCharacter(' -> ');

        $this->assertEquals([
            'a -> a',
            'a -> b',
            'a -> c -> a',
            'a -> c -> b',
            'a -> c -> c -> a',
            'a -> c -> c -> b -> a',
            'a -> c -> c -> c -> a',
            'a -> d -> a',
            'b -> a'
        ], $glue->glue());
    }

    public function testKeyGlue2WithValue()
    {
        $glue = new KeyGlue();
        $glue->setArray($this->getTestArray());
        $glue->setGlueCharacter(' -> ');
        $glue->setWithValue(true);

        $this->assertEquals([
            'a -> a' => 'Test1',
            'a -> b' => 'Test2',
            'a -> c -> a' => 'Test3',
            'a -> c -> b' => 'Test4',
            'a -> c -> c -> a' => 'Test5',
            'a -> c -> c -> b -> a' => 'Test6',
            'a -> c -> c -> c -> a' => 'Test7',
            'a -> d -> a' => 'Test8',
            'b -> a' => 'Test9'
        ], $glue->glue());
    }

    private function getTestArray()
    {
        return [
            'a' => [
                'a' => 'Test1',
                'b' => 'Test2',
                'c' => [
                    'a' => 'Test3',
                    'b' => 'Test4',
                    'c' => [
                        'a' => 'Test5',
                        'b' => [
                            'a' => 'Test6'
                        ],
                        'c' => [
                            'a' => 'Test7'
                        ]
                    ]
                ],
                'd' => [
                    'a' => 'Test8'
                ]
            ],
            'b' => [
                'a' => 'Test9'
            ]
        ];
    }
}
