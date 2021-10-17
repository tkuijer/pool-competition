<?php

namespace App\Services;

use Illuminate\Support\Stringable;

class StringService
{
    public static function loadMacros()
    {
        Stringable::macro('md5', function (): Stringable {
            $this->value = md5($this->value);

            return $this;
        });

        Stringable::macro('toHexColor', function (): Stringable {
            $this->value = '#'.$this->md5()->substr(0, 6);

            return $this;
        });
    }
}
