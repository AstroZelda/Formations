# PHP Formation Notes

...

## Before

- `htmlelements()` to prevent code injection.

## 14. 

- `implode()` to join array elements using a separator
- `empty()` to check if null, false, zero or empty array
- `date()` to display date and time depending on given format

## 15. et 16.

- Le '/' permet généralement d'indiquer une séparation entre deux dossiers, mais si ça ne marche pas il y a la variable `DIRECTORY_SEPARATOR` qui contient automatiquement le bon caractère.
- `dirname($path)` donne le chemin du dossier parent à $path
- `@` devant une fonction pour cacher les erreurs
- Retour à la ligne en écrivant dans un fichier : `PHP_EOL` 

## 17. 

- Pour supprimer un cookie on fait un `setcookie()` avec une expiration dans le passé (par exemple `time() - 10`). À noter que si la page n'est pas rechargée et les cookies récupérés on peut temporairement mettre à jour la valeur locale manuellement en modifiant $_COOKIE['monCookie']
- Pour stocker des objets plus complexes on peut utiliser `serialize()` pour convertir l'array en chaine de caractère, puis `unserialize()` pour récupérer notre array initial

## 18.

- session_start() pour créer une session, ou pour récupérer les informations si la session existe déjà
- inutile si on n'a pas besoin de lire/écrire sur la page
- l'écriture dans la session se fait directement dans $_SESSION['monParametre'], le commit est automatique à la fin de l'interprétation du code

## 21.

- Possibilité de faire une fonction pour démarrer la session sans risquer d'erreur :

```php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
```

- Pour lancer une exécution sans affichage (comme un logout par exemple), on peut créer une page avec uniquement du php, qui fait le traitement et redirige vers une autre page 

## 22.

- Pour stocker et comparer les mots de passe on peut utiliser `password_hash($value, PASSWORD_DEFAULT)` et `password_verify($valeur_en_clair, $valeur_hash)`

## 24. 

- Classiquement, les noms de class ainsi que le nom de leur fichier respectif commencent par une majuscule
- L'accès à des méthodes ou des propriétés se fait avec la syntaxe `objet->propriete`

## 25. 

- Pour accéder à une méthode statique on utilise la syntaxe `MaClasse::ma_methode()` 

## 26. 

- Classiques 3 visibilités : `public`, `private` et `protected`
- Les constantes (`const`) sont des valeurs statiques. 
- Il y a deux façons de récupérer la valeur d'un constante dans une méthode :
  - `self::MA_CONST` qui récupérera systématiquement la valeur dans la class où la méthode se situe
  - `static::MA_CONST` qui récupérera la valeur dans la class de l'objet (permet par exemple de modifier la valeur de la constante dans une class qui hérite de celle où la constante a été définie)

## 27.

- `json_encode()` et `json_decode()` 
- 
