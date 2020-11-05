<?php

if (! function_exists('prepareMultipleInputData')) {
    function prepareMultipleInputData($data)
    {
        $preparedData = [];

        // Map multiple values to subarrays
        foreach ($data as $property => $values) {
            foreach ($values as $index => $value) {
                $preparedData[$index][$property] = $value;
            }
        }

        // Remove subarrays if all values are null
        foreach ($preparedData as $key => $values) {
            if (count(array_unique($values)) === 1) {
                unset($preparedData[$key]);
            }
        }

        return $preparedData;
    }
}