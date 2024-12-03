<?php

class Creneau {

    public $debut;
    public $fin;

    public function __construct(int $debut, int $fin) {

        if ($debut < 0) {
            throw new UnexpectedValueException("L'heure de début doit être supérieure ou égale à 0");
        }

        if ($fin > 24) {
            throw new UnexpectedValueException("L'heure de fin doit être inférieure ou égale à 24");
        }

        if ($debut >= $fin) {
            throw new UnexpectedValueException("L'heure de début doit être strictement inférieure à l'heure de fin");
        }

        $this->debut = $debut;
        $this->fin = $fin;
    }

    public function to_html(): string {
        return "<strong>{$this->debut}h</strong> à <strong>{$this->fin}h</strong>";
    }

    public function inclus_heure(int $heure): bool {
        return $this->debut <= $heure && $heure < $this->fin;
    }

    private function _inclus_heure_stricte(int $heure): bool {
        return $this->debut < $heure && $heure < $this->fin;
    }

    public function intersection(Creneau $creneau): bool {
        return $this->_inclus_heure_stricte($creneau->debut)
            || $this->_inclus_heure_stricte($creneau->fin)
            || $creneau->_inclus_heure_stricte($this->debut)
            || $creneau->_inclus_heure_stricte($this->fin);
    }

}