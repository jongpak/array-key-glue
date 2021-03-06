<?php

namespace Prob\ArrayUtil;

use PHPUnit_Framework_TestCase;

class KeyGlueTest extends PHPUnit_Framework_TestCase
{
    public function testKeySimple()
    {
        $glue = new KeyGlue();
        $glue->setGlueCharacter('.');
        $glue->setArray([
            'a' => ['one', 'two', 'three'],
            'b' => [
                'one' => ['hello', 'world']
            ]
        ]);

        $this->assertEquals([
            'a',
            'b.one'
        ], $glue->glueOnlyKey());
    }

    public function testKeySimpleWithValue()
    {
        $glue = new KeyGlue();
        $glue->setGlueCharacter('.');
        $glue->setArray([
            'a' => ['one', 'two', 'three'],
            'b' => [
                'one' => ['hello', 'world']
            ]
        ]);

        $this->assertEquals([
            'a' => ['one', 'two', 'three'],
            'b.one' => ['hello', 'world']
        ], $glue->glueKeyAndContainValue());
    }

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
            'b.a',
            'b.b',
            'b.c'
        ], $glue->glueOnlyKey());
    }

    public function testKeyGlue1WithValue()
    {
        $glue = new KeyGlue();
        $glue->setArray($this->getTestArray());
        $glue->setGlueCharacter('.');

        $this->assertEquals([
            'a.a' => 'Test1',
            'a.b' => 'Test2',
            'a.c.a' => 'Test3',
            'a.c.b' => 'Test4',
            'a.c.c.a' => 'Test5',
            'a.c.c.b.a' => 'Test6',
            'a.c.c.c.a' => 'Test7',
            'a.d.a' => 'Test8',
            'b.a' => 'Test9',
            'b.b' => [],
            'b.c' => ['a', 'b', 'c']
        ], $glue->glueKeyAndContainValue());
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
            'b -> a',
            'b -> b',
            'b -> c'
        ], $glue->glueOnlyKey());
    }

    public function testKeyGlue2WithValue()
    {
        $glue = new KeyGlue();
        $glue->setArray($this->getTestArray());
        $glue->setGlueCharacter(' -> ');

        $this->assertEquals([
            'a -> a' => 'Test1',
            'a -> b' => 'Test2',
            'a -> c -> a' => 'Test3',
            'a -> c -> b' => 'Test4',
            'a -> c -> c -> a' => 'Test5',
            'a -> c -> c -> b -> a' => 'Test6',
            'a -> c -> c -> c -> a' => 'Test7',
            'a -> d -> a' => 'Test8',
            'b -> a' => 'Test9',
            'b -> b' => [],
            'b -> c' => ['a', 'b', 'c']
        ], $glue->glueKeyAndContainValue());
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
                'a' => 'Test9',
                'b' => [],
                'c' => ['a', 'b', 'c']
            ]
        ];
    }
}
