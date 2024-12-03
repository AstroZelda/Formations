<?php

class Message {

    private $username;
    private $message;
    private $date;

    public function __construct(string $username, string $message, DateTime $date = null) {
        $this->username = $username;
        $this->message = $message;
        $this->date = $date ?? new DateTime();
    }

    public function is_valid(): bool {
        return count($this->get_errors()) === 0;
    }

    public function get_errors(): array {
        $errors = [];

        if (strlen($this->username) < 3) {
            $errors['username'] = "Ce pseudo est trop court";
        } elseif (strlen($this->username) > 30) {
            $errors['username'] = "La taille du pseudo ne doit pas excéder 30 caractères";
        }


        if (strlen($this->message) < 1) {
            $errors['message'] = "Ce message est trop court";
        } elseif (strlen($this->message) > 1000) {
            $errors['message'] = "La taille du message ne doit pas excéder 1000 caractères";
        }

        return $errors;
    }

    public function to_html(): string {
        $date = $this->date->format("d/m/Y");
        $time = $this->date->format("H:i");

        $html = "<div class=\"card mb-1\">";
        $html .= "<div class=\"card-body\">";
        $html .= "<h6 class=\"car-title\">";
        $html .= "<strong>$this->username</strong>, ";
        $html .= "le $date à $time";
        $html .= "</h6>";
        $html .= "<p class=\"card-text\">";
        $html .= nl2br($this->message);
        $html .= "</p>";
        $html .= "</div>";
        $html .= "</div>";

        return $html;
    }

    public function to_json(): string {
        $data = [
            "username" => $this->username,
            "message" => $this->message,
            "date" => $this->date->getTimestamp(),
        ];

        return json_encode($data);
    }

    public static function from_json(string $json): Message {
        $data = json_decode($json, true);
        return new self($data["username"], $data["message"], new DateTime("@" . $data["date"]));
    }
}