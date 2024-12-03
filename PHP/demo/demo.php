<?php
// include 'functions.php';
require_once 'functions.php';

// I) -----------------------------------------------------------------------------------------------
// $note1 = 10;
// $note2 = 20;
// $moyenne = ($note1 + $note2) /2;

// $prenom = 'Marc';
// $nom = 'Doe';
// $nom_complet = $prenom . ' ' . $nom;

// echo "Bonjour $nom_complet, vous avez eu $moyenne de moyenne";

// II) -----------------------------------------------------------------------------------------------
// $eleve = [
//     'nom' => 'Doe',
//     'prenom' => 'Marc',
//     'notes' => [10, 20, 9, 8],
// ];

// echo "Bonjour {$eleve['prenom']} {$eleve['nom']}, vous avez eu ces notes : ";
// print_r($eleve['notes']);

// III) -----------------------------------------------------------------------------------------------
// $note = (int)readline('Entrez votre note : ');

// if ($note > 10) {
//     echo "Bravo, vous avez la moyenne !";
// } elseif ((int)$note === 10) {
//     echo "Vous avez tout juste la moyenne :o";
// } else {
//     echo "Dommage, vous n'avez pas la moyenne";
// }

// IV) -----------------------------------------------------------------------------------------------
// $action = (int)readline('Entrez votre action : (1: attaquer, 2: défendre, 3: passer mon tour)');

// switch ($action) {
//     case 1: 
//         echo "J'attaque !";
//         break;
//     case 2:
//         echo "Je défends !";
//         break;
//     case 3:
//         echo "J'attends.";
//         break;
//     default :
//         echo "Commande inconnue.";
// }

// V) -----------------------------------------------------------------------------------------------
// $heure = (int)readline('Quelle heure est-il ?');

// if ((9 <= $heure && $heure < 12) || (14 <= $heure && $heure < 17)) {
//     echo "Le magasin est ouvert !";
// } else {
//     echo "Le magasin est fermé, repassez...";
// }

// VI) -----------------------------------------------------------------------------------------------
// $chiffre = null;

// while ($chiffre !== 10) {
//     $chiffre = (int)readline('devinez le chiffre : ');
// }

// echo "bravo";

// for ($i = 0; $i < 10; $i++) {
//     echo "- $i\n";
// }

// $notes = [10, 15, 16];

// foreach ($notes as $note) {
//     echo "- $note\n";
// }

// $eleves = [
//     'CM1' => ['Jean', 'Marc', 'Jane', 'Marion'],
//     'CM2' => ['Emilie', 'Marcelin'],
// ];

// foreach ($eleves as $classe => $eleves) {
//     echo "La classe de $classe :\n";
//     foreach ($eleves as $eleve) {
//         echo "- $eleve\n";
//     }
// }

// $commande = null;
// $notes = [];
// $index = 0;

// while ($commande !== 'fin') {
//     if ($commande != null) {
//         $notes[$index] = (int)$commande;
//         $index++;
//     }

//     $commande = readline("Entrez une note à ajouter à votre carnet, ou tapez 'fin' pour terminer : ");
// }

// echo "Vos notes :\n";
// foreach($notes as $note) {
//     echo " - $note\n";
// }


// $heureOuverture = null;

// while ($heureOuverture == null) {
//     $heureOuverture = (int)readline('À quelle heure le magasin ouvre-t-il ? ') %24;
// }


// $heureFermeture = null;

// while ($heureFermeture == null || $heureFermeture <= $heureOuverture) {
//     $heureFermeture = (int)readline('À quelle heure le magasin ferme-t-il ? ') %24;
//     if ($heureFermeture <= $heureOuverture) {
//         echo "L'heure de fermeture doit arriver après l'heure d'ouverture\n";
//     }
// }


// $action = null;

// while (true) {
//     $action = readline('Entrez une heure pour vérifier la disponibilité du magasin, ou "fin" pour terminer : ');

//     if ($action === 'fin') {
//         break;
//     } elseif ((int)$action == null) {
//         echo "valeur incorrecte\n";
//     } else if ((int)$action >= $heureOuverture && (int)$action < $heureFermeture) {
//         echo "le magasin est ouvert\n";
//     } else {
//         echo "le magasin est fermé\n";
//     }

// }

// $string = strtolower(readline("Entrez un palindrome : "));

// if ($string === STRREV($string)) {
//     echo "En effet, '$string' est un palindrome !";
// } else {
//     echo "Non, '$string' n'est pas un palindrome.";
// }

// $notes = [10, 15, 9, 13, 2];
// $total = array_sum($notes);
// $nbNotes = count($notes);
// $moyenne = $total / $nbNotes;
// echo "Total des notes : $total\n";
// echo "nombre de notes : $nbNotes\n";
// echo "Moyenne des notes : $moyenne\n";

// $complex_array = [
//     [1,2,3,4,5,6],
//     [2,3,4,5,6],
//     [2,4,5,6],
// ];

// echo count($complex_array, COUNT_RECURSIVE);
// var_dump($complex_array);

// $insultes = ['merde', 'con'];
// $phrase = readline('Entrez votre phrase : ');
// $phraseCensuree = $phrase;
// foreach ($insultes as $insulte) {
//     $remplacement = str_repeat('*', strlen($insulte));
//     $phraseCensuree = str_replace($insulte, $remplacement, $phraseCensuree);
// }
// echo "Vous avez écrit '$phraseCensuree' !";

// function bonjour($nom = null): string {
//     if (is_null($nom)) {
//         return "Bonjour !\n";
//     } else {
//         return "Bonjour $nom !\n";
//     }
// }

// echo bonjour('Jean');
// echo bonjour('Marion');
// echo bonjour();

// function repondre_oui_nom(string $message): bool {
//     while (true) {
//         $reponse = readline("$message (O/n) : ");
//         if ($reponse === '' || strtolower($reponse) === 'o') {
//             return true;
//         } elseif (strtolower($reponse) === 'n') {
//             return false;
//         }
//     }
// }

// $reponse = repondre_oui_nom('Voulez-vous continuer ?');

// if ($reponse) { 
//     echo 'Vous avez accepté';
// } else {
//     echo 'Vous avez refusé';
// }

// recursive_display([9, 8, 5, 4, 6, 7, 8, 1, 3]);

// $base = 'base';
// $a_concatener = 'test';
// $base .= " $a_concatener";
// echo $base;	

// $a = ['title' => 'yes', 'other' => 2];
// $b = ['title' => 'yes', 'other' => 2];

// echo $a == $b;
// echo $a === $b;

// $a = 2;
// $b = 4;
// echo $a + $b / $b + $a;

// $file = __DIR__ . '/files/demo.txt';
// $dir = __DIR__ .'';
// $dirname = dirname(__DIR__) .'';
// $dirname2 = dirname($dirname) .'';
// file_put_contents($fichier, "$dir\n", FILE_APPEND);
// file_put_contents($fichier, "$dirname\n", FILE_APPEND);
// file_put_contents($fichier, "$dirname2\n", FILE_APPEND);

// echo file_get_contents($fichier);

// $fichier_csv = __DIR__ . '/files/demo.csv';
// $resource = fopen($fichier_csv,'r');
// echo fread($resource, 2);
// echo var_dump(fstat($resource));
// echo fgets($resource);
// echo fgets($resource);

// $date = new DateTime();
// // var_dump($date);
// echo $date->format('d/m/Y') . "\n";
// $date->modify('+1 month');
// echo $date->format('d/m/Y') . "\n";

$d1 = new DateTime();
$d2 = new DateTime('2024-11-01');

$dif = $d1->diff($d2, true);
echo $dif->days;