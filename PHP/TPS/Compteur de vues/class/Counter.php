<?php
require_once 'utils/functions.php';

class Counter {

    

    // INCREMENTS -----------------------------------------------------------------

    
    public function increment_all_counters() {
        $this->increment_day_counter();
        $this->increment_year_counter();
        $this->increment_global_counter();
    }
    public function increment() { $this->increment_all_counters(); } // Alias
    
    private function increment_counter(string $filepath) {
        $current_value = $this->get_file_count($filepath);
        file_put_contents($filepath, $current_value + 1);
    }
    
    private function increment_day_counter() {
        $this->increment_counter($this->get_day_file_path());
    }
    
    private function increment_year_counter() {
        $this->increment_counter($this->get_year_file_path());
    }
    
    private function increment_global_counter() {
        $this->increment_counter($this->get_global_file_path());
    }

    
    // GET COUNTS -----------------------------------------------------------------

    public function get_file_count(string $filepath): int {
        return file_exists($filepath) ? (int)file_get_contents($filepath) : 0;
    }
    
    public function get_day_file_count(): int {
        return $this->get_file_count($this->get_day_file_path());
    }
    
    public function get_year_file_count(): int {
        return $this->get_file_count($this->get_year_file_path());
    }
    
    public function get_global_file_count(): int {
        return $this->get_file_count($this->get_global_file_path());
    }

    public function get_count(string $text = null):string { 
        $count = $this->get_global_file_count(); 
        
        if (empty(trim($text))) {
            return $count;
        } else {
            $plural = $count > 1 ? 's' : '';
            return $count . ' ' . $text . $plural;
        }

    }
    
    public function get_specific_file_count(string $date): int {
        return $this->get_file_count($this->get_specific_file_path($date));
    }
    

    // GET PATHS -----------------------------------------------------------------
    
    public function get_day_file_path(): string {
        return DATA_PATH . 'counter_' . date('Y-m-d') . '.txt';
    }
    
    public function get_year_file_path(): string {
        return DATA_PATH . 'counter_' . date('Y') . '.txt';
    }
    
    public function get_global_file_path(): string {
        return DATA_PATH . 'counter.txt';
    }
    
    public function get_specific_file_path(string $date): string {
        return DATA_PATH . 'counter_' . $date . '.txt';
    }

    
    // CHECKS -----------------------------------------------------------------
    
    public function is_specific_counter_file(string $filename): bool {
        return preg_match(REGEX_COUNTER_FILE, $filename);
    }
    
    public function is_day_counter_file(string $filename): bool {
        return preg_match(REGEX_DAY_COUNTER_FILE, $filename);
    }
    
    public function is_day_of_year_counter_file(string $filename, string $year): bool {
        return preg_match('/^counter_(' . $year . '-(\\d){2}-(\\d){2}).txt$/', $filename);
    }
    
    public function is_year_counter_file(string $filename): bool {
        return preg_match(REGEX_YEAR_COUNTER_FILE, $filename);
    }
    
    public function get_specific_counter_files(): array { 
        $files = scandir(DATA_PATH);
        $filter_function = fn($file_name) => $this->is_specific_counter_file( $file_name);
        return array_filter($files, $filter_function); 
    }
    
    public function get_days(): array {	
        $files = scandir(DATA_PATH);
        $filter_function = fn($file_name) => $this->is_day_counter_file( $file_name);
        $day_files = array_filter($files, $filter_function); 
        $days = [];
    
        foreach ($day_files as $day_file) {
            $days[] = $this->get_day_from_filename($day_file);
        }
    
        return $days;
    }


    // GET TIMES -----------------------------------------------------------------

    public function get_day_from_filename(string $filename): string {
        preg_match(REGEX_DAY_COUNTER_FILE, $filename, $matches);
        return $matches[1];
    }
    
    public function get_days_of_year(string $year): array {
        $files = scandir(DATA_PATH);
        $filter_function = fn($file_name) => $this->is_day_of_year_counter_file( $file_name, $year);
        $day_files = array_filter($files, $filter_function); 
        $days = [];
    
        foreach ($day_files as $day_file) {
            $days[] = $this->get_day_from_filename($day_file);
        }
    
        return $days;
    }
    
    public function get_year_from_filename(string $filename): string {
        preg_match(REGEX_YEAR_COUNTER_FILE, $filename, $matches);
        return $matches[1];
    }
    
    public function get_years(): array {
        $files = scandir(DATA_PATH);
        $filter_function = fn($file_name) => $this->is_year_counter_file( $file_name);
        $year_files = array_filter($files, $filter_function); 
        $years = [];
        
        foreach ($year_files as $year_file) {
            $years[] = $this->get_year_from_filename($year_file);
        }
    
        return $years;
    }
}