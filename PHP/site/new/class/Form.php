<?php

class Form {

    public static $class = "";

    public static function checkbox(string $name, string $value = null, array $data = []): string {
        $attributes = '';

        if (isset($data[$name]) && in_array($value, $data[$name])) {
            $attributes .= 'checked';
        }

        $value_hyphens = str_replace(' ', '-', $value);
        
        $html = "<div class=\"form-check\">\n";
        $html .= "<input type=\"checkbox\" class=\"form-check-input\" name=\"{$name}[]\" id=\"checkbox-$value_hyphens\" value=\"$value\" $attributes>\n";
        $html .= "<label class=\"form-check-label\" for=\"checkbox-$value_hyphens\">$value</label>\n";
        $html .= "</div>\n";

        return $html;
    }

    public static function radio(string $name, string $value = null, string $data = null): string {
        $attributes = '';

        if (isset($data) && $value === $data) {
            $attributes .= 'checked';
        }
        
        $value_hyphens = str_replace(' ', '-', $value);

        $html = "<div class=\"form-check\">\n";
        $html .= "<input type=\"radio\" class=\"form-check-input\" name=\"$name\" id=\"radio-$value_hyphens\" value=\"$value\" $attributes>\n";
        $html .= "<label class=\"form-check-label\" for=\"radio-$value_hyphens\">$value</label>\n";
        $html .= "</div>\n";
        
        return $html;
    }
}