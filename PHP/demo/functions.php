<?php

function recursive_display(?array $elements) {
    if (count($elements) > 0) {
        foreach ($elements as $element) {
            echo "$element ";
        }
        echo "\n";
        recursive_display(array_slice($elements, 1));
    }
}