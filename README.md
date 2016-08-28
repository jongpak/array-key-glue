# jongpak/array-key-glue
Implode keys of array recursively

## Simple usage
```php
use Prob\ArrayUtil\KeyGlue;

$array = [
    'A' => [
        'B' => 'Value1',
        'C' => 'Value2',
        'D' => [
            'E' => 'Value3',
            'F' => 'Value4'
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
```

```php
$glue->setGlueCharacter('.');   // glue '.'
$glue->setWithValue(false);     // only key (default)
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
```

```php
$glue->setGlueCharacter('.');   // glue '.'
$glue->setWithValue(true);      // with value
$glue->glue();
/*
 * Array
 * (
 *     [A.B]    => 'Value1'
 *     [A.C]    => 'Value2'
 *     [A.D.E]  => 'Value3'
 *     [A.D.F]  => 'Value4'
 *     [G.0]    => 'H'
 *     [G.1]    => 'I'
 *     [G.2]    => 'J'
 * )
 */
```

```php
$glue->setGlueCharacter(' -> ');    // glue ' -> '
$glue->setWithValue(false);         // only key (default)
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

```php
$glue->setGlueCharacter(' -> ');    // glue ' -> '
$glue->setWithValue(true);         // with value
$glue->glue();
/*
 * Array
 * (
 *     [A -> B]         => 'Value1'
 *     [A -> C]         => 'Value2'
 *     [A -> D -> E]    => 'Value3'
 *     [A -> D -> F]    => 'Value4'
 *     [G -> 0]         => 'H'
 *     [G -> 1]         => 'I'
 *     [G -> 2]         => 'J'
 * )
 */
```
