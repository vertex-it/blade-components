<?php

namespace VertexIT\BladeComponents\Traits;

use Illuminate\Support\Str;

trait HasOptions
{
    public function keysAreSet(): bool
    {
        $i = 0;

        foreach ($this->options as $key => $option) {
            if ($i !== $key) {
                return true;
            }

            $i++;
        }

        return false;
    }

    public function getPreparedOptions()
    {
        if (! $this->keysAreSet()) {
            $preparedOptions = [];

            foreach ($this->options as $option) {
                $preparedOptions[Str::snake($option)] = $option;
            }

            return $preparedOptions;
        }

        return $this->options;
    }

    public function checkIfActive($option, $output): string
    {
        $checkAgainst = old($this->name) ?? $this->value;

        if (is_array($checkAgainst)) {
            return in_array($option, $checkAgainst) ? $output : '';
        }

        return $option == $checkAgainst ? $output : '';
    }
}
