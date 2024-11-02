<?php

namespace App\Traits;

/**
 * Trait Template
 * @package App\Traits
 */
trait Template
{
    /**
     * @param string $name
     * @param string|null $dir
     * @return string
     */
    public function template(string $name, string $dir = null)
    {
        $directory = $dir ?? $this->templateDir;
        return "{$directory}.{$name}";
    }
}
