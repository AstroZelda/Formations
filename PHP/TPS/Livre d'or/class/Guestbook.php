<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Message.php';

class Guestbook {
    
    private $fichier;

    public function __construct(string $fichier = 'data/guestbook.json') {
        $this->fichier = $fichier;
    }

    public function add_message(Message $message): bool {
        $message_json = $message->to_json() . PHP_EOL;

        return file_put_contents($this->fichier, $message_json, FILE_APPEND);
    }

    public function get_messages() : array {
        $messages = [];

        if (file_exists($this->fichier)) {

            $file = fopen($this->fichier, 'r') or die("Couldn't open file");
            // ouvrir le fichier et faire un while avec assignation pour lire la nextline à chaque fois
            while ($line = fgets($file)) {
            $messages[] = Message::from_json($line);
            }

        } else {
            $fh = fopen($this->fichier, 'w') or die("Can't create file");
        }

        return $messages;
    }
}