<?php
// require_once 'utils/functions.php';

// function increment_all_counters() {
//     increment_day_counter();
//     increment_year_counter();
//     increment_global_counter();
// }

// function increment_counter(string $filepath) {
//     $current_value = get_file_count($filepath);
//     file_put_contents($filepath, $current_value + 1);
// }

// function increment_day_counter() {
//     increment_counter(get_day_file_path());
// }

// function increment_year_counter() {
//     increment_counter(get_year_file_path());
// }

// function increment_global_counter() {
//     increment_counter(get_global_file_path());
// }



// function get_file_count(string $filepath): int {
//     return file_exists($filepath) ? (int)file_get_contents($filepath) : 0;
// }

// function get_day_file_count(): int {
//     return get_file_count(get_day_file_path());
// }

// function get_year_file_count(): int {
//     return get_file_count(get_year_file_path());
// }

// function get_global_file_count(): int {
//     return get_file_count(get_global_file_path());
// }

// function get_specific_file_count(string $date): int {
//     return get_file_count(get_specific_file_path($date));
// }



// function get_day_file_path(): string {
//     return DATA_PATH . 'counter_' . date('Y-m-d') . '.txt';
// }

// function get_year_file_path(): string {
//     return DATA_PATH . 'counter_' . date('Y') . '.txt';
// }

// function get_global_file_path(): string {
//     return DATA_PATH . 'counter.txt';
// }

// function get_specific_file_path(string $date): string {
//     return DATA_PATH . 'counter_' . $date . '.txt';
// }


// function is_specific_counter_file(string $filename): bool {
//     return preg_match(REGEX_COUNTER_FILE, $filename);
// }

// function is_day_counter_file(string $filename): bool {
//     return preg_match(REGEX_DAY_COUNTER_FILE, $filename);
// }

// function is_day_of_year_counter_file(string $filename, string $year): bool {
//     return preg_match('/^counter_(' . $year . '-(\\d){2}-(\\d){2}).txt$/', $filename);
// }

// function is_year_counter_file(string $filename): bool {
//     return preg_match(REGEX_YEAR_COUNTER_FILE, $filename);
// }

// function get_specific_counter_files(): array { 
//     $files = scandir(DATA_PATH);
//     return array_filter($files, "is_specific_counter_file"); 
// }

// function get_days(): array {	
//     $files = scandir(DATA_PATH);
//     $day_files = array_filter($files, "is_day_counter_file"); 
//     $days = [];

//     foreach ($day_files as $day_file) {
//         $days[] = get_day_from_filename($day_file);
//     }

//     return $days;
// }

// function get_days_of_year(string $year): array {
//     $files = scandir(DATA_PATH);
//     $sort_function = fn($file_name) => is_day_of_year_counter_file( $file_name, $year);
//     $day_files = array_filter($files, $sort_function); 
//     $days = [];

//     foreach ($day_files as $day_file) {
//         $days[] = get_day_from_filename($day_file);
//     }

//     return $days;
// }

// function get_years(): array {
//     $files = scandir(DATA_PATH);
//     $year_files = array_filter($files, "is_year_counter_file"); 
//     $years = [];
    
//     foreach ($year_files as $year_file) {
//         $years[] = get_year_from_filename($year_file);
//     }

//     return $years;
// }

// function get_day_from_filename(string $filename): string {
//     preg_match(REGEX_DAY_COUNTER_FILE, $filename, $matches);
//     return $matches[1];
// }

// function get_year_from_filename(string $filename): string {
//     preg_match(REGEX_YEAR_COUNTER_FILE, $filename, $matches);
//     return $matches[1];
// }


