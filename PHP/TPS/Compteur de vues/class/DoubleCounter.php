<?php
require_once 'class/Counter.php';

class DoubleCounter extends Counter {

    public function get_global_file_count(): int {
        return parent::get_global_file_count() * 100 + rand(0, 99);
    }

}