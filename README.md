# jongpak/array-key-glue
Implode keys of array recursively

## Simple usage
```php
use Prob\ArrayUtil\KeyGlue;

$array = [
    'A' => [
        'B' => true,
        'C' => 0,
        'D' => [
            'E' => 1,
            'F' => '2'
        ]
    ],
    'G' => [
        'H',
        'I',
        'J'
    ]
];

$glue = new KeyGlue();
$glue->setArray($array);

$glue->setGlueCharacter('.');
$glue->glue();
/*
 * Array
 * (
 *     [0] => A.B
 *     [1] => A.C
 *     [2] => A.D.E
 *     [3] => A.D.F
 *     [4] => G.0
 *     [5] => G.1
 *     [6] => G.2
 * )
 */

$glue->setGlueCharacter(' -> ');
$glue->glue();
/*
 * Array
 * (
 *     [0] => A -> B
 *     [1] => A -> C
 *     [2] => A -> D -> E
 *     [3] => A -> D -> F
 *     [4] => G -> 0
 *     [5] => G -> 1
 *     [6] => G -> 2
 * )
 */
```
