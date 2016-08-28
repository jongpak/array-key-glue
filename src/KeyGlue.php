<?php

namespace Prob\ArrayUtil;

class KeyGlue
{

    private $glueCharacter = '.';

    /**
     * processing target array
     * @var array
     */
    private $array = [];
    private $glueKeys = [];


    public function setArray(array $array)
    {
        $this->array = $array;
    }

    public function setGlueCharacter($glueCharacter)
    {
        $this->glueCharacter = $glueCharacter;
    }

    public function glue()
    {
        $this->glueKeys = [];

        $this->glueLoop($this->array);
        return $this->glueKeys;
    }

    private function glueLoop(array $array, $prev = '')
    {
        foreach ($array as $key => $value) {
            $curr = $this->getCurrentGlueName($key, $prev);

            if ($this->hasChild($value)) {
                $this->glueLoop($value, $curr);
                continue;
            }

            $this->glueKeys[] = $curr;
        }
    }

    private function getCurrentGlueName($key, $prev)
    {
        return $prev !== ''
                ? $prev . $this->glueCharacter . $key
                : $key;
    }

    public static function hasChild($value)
    {
        return is_array($value) && count($value) > 0;
    }
}