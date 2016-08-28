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

    private function getTestArray()
    {
        return [
            'a' => [
                'a' => '',
                'b' => '',
                'c' => [
                    'a' => '',
                    'b' => '',
                    'c' => [
                        'a' => '',
                        'b' => [
                            'a' => ''
                        ],
                        'c' => [
                            'a' => ''
                        ]
                    ]
                ],
                'd' => [
                    'a' => ''
                ]
            ],
            'b' => [
                'a' => ''
            ]
        ];
    }
}
