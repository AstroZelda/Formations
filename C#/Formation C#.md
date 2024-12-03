# Formation C#

## Vidéo récap C#
[video](https://www.youtube.com/watch?v=FqCHwSH56PA)

- Types explicites ou implicites

- Getters et setters après la propriété, avec `{ get; set; }`

- Cette syntaxe génère des méthodes qui sont appelées implicitements quand on essaye d'accéder naturellement à la propriété

- Il est donc impossible d'accéder à une propriété sans accesseurs

- Quand on veut ajouter une logique particulière au getter et (surtout) au setter, il faut passer par une variable privée, appellée "champ backing" ou "backing field", comme ceci :
  ```c#
  private string _propriete;
  
  public string Propriete {
      get { return _propriete; }
      set { _propriete = value; }
  }
  ```

  Il suffit d'ajouter les logiques dans le corps des accesseurs. Impossible de le faire directement sur `Propriete` car cela appellerait en boucle le setter.

- Les préférences de nommage divergent, cependant si les champs publics sont tous en PascalCase, les champs privés ont tendance à être en camelCase, et plus spécifiquement préfixés d'un underscore pour éviter toute confusion.

- Les classes abstraites destinées à être des interfaces sont préfixées d'un `I`. Exemple : `IEnumerable`

- Appel du constructeur classique ou avec 
  ```c#
  new MonObjet {
      Nom: "nom",
      Categorie: "aucune",
  }
  ```

- L'équivalent des streams en C# s'appelle **LINQ** (**L**anguage **IN**tegrated **Q**uery) et s'utilise comme suit :
  ```c#
  List<MonObjet> Objets = ...
  IEnumerable objetsTries = Objets.Where(obj => ...);
  ```

  La liste des opérateurs est trouvable [ici](https://learn.microsoft.com/fr-fr/dotnet/csharp/linq/get-started/introduction-to-linq-queries#classification-table).
  On note que les variables locales sont nommées en camelCase.

- On peut écrire des fonctions lambda de cette façon :
  ```c#
  (a, b) => DoSomething(a, b);
  ```

- On peut écrire des fonctions asynchrones de cette façon :
  ```c#
  private readonly HttpClient _httpClient = new HttpClient():
  
  downloadButton.Clicked += async (o, e) => {
      var stringData = await _httpClient.GetStringAsync(URL);
      DoSomethingWithData(stringData, o, e);
  }
  ```


___

## Formation C# pour developpeurs Java
[playlist](https://www.youtube.com/playlist?list=PLkX2tb_Jm6xqj9hZ8LczOHoSELIr5SXeU)

## 01 - Introduction

- Pour l'import de bibliothèques, on utilise le mot-clé `using`. Pour importer tout le contenu d'une bibliothèque, on ne fait pas `using MaBibliotheque.*;` mais simplement `using MaBibliotheque;`

## 02 - Properties

- Possibilité de définir une classe comme étant statique, définissant d'un même coup tout son contenu comme étant statique
- Les namespaces permettent de sectoriser les classes. Il est même possible de déclarer le même nom de namespace dans plusieurs fichiers, afin de bien séparer les spécificités en plusieurs fichiers mais de rassembler les classes dans un seul thème. 

## 03 - Constructors

- Il est possible de définir des valeurs par défaut à des propriétés : `public int MaPropriete { get; } = 20;`

- **Initialisation d'objet** : C'est une forme abrégée qui appelle le constructeur par défaut et set un par un les paramètres. La syntaxe `MonObjet o = new MonObjet { Age = 5, Nom = "Steve" };` revient à faire 

  ```c#
  MonObjet o = new MonObjet();
  o.Age = 5;
  o.Nom = "Steve";
  ```

  Il est ainsi possible de bloquer cette syntaxe en déclarant explicitement le constructeur par défaut comme privé, ou en retirant les setters des paramètres.

- **Constructor chaining** : On peut définir plusieurs constructeurs qui s'appellent entre eux si besoin :

  ```c#
  public MonObjet() {
      Age = 0;
      Nom = "";
  }
  
  public MonObjet(int age, string nom) {
      Age = age;
      Nom = nom;
  }
  ```

  peut être simplifié en 
  ```c#
  public MonObjet() : this(0, "") {}
  
  public MonObjet(int age, string nom) {
      Age = age;
      Nom = nom;
  }
  ```

  Il est à noter qu'en appelant la première méthode, le code s'exécutera dans cet ordre : 

  1) d'abord la méthode appelée par this() 
  2) puis le corps de la méthode

  <u>Cette syntaxe est limitée aux constructeurs.</u>

## 09 - Lists

- On peut récupérer un caractère dans un string en faisant `monString[index]`

## 11 - Nullable types

- Ajouter un `?` après un type spécifie qu'il peut être null
- Il s'agit d'un alias de Nullable<T>

## 12 - Delegates

- Ce sont des classes auxquelles on peut assigner des méthodes ou des fonctions, exécutables avec la méthode `invoke()`

- Les deux principales sont `Action`, qui retourne toujours `void`, et `func` qui retourne toujours un résultat.

- Pour Action la syntaxe est 

  ```c#
  private static void m1() {...}
  private static void m2(Type param) {...}
  
  var actionSansParametre = new Action(m1);
  actionSansParametre.invoke();
  
  var actionAvecParametre = new Action<Type>(m2);
  Type parametre = ...;
  actionAvecParametre.invoke(parametre);
  ```

- Pour Func la syntaxe est
  ```c#
  private static TypeRetour m1() {...}
  private static TypeRetour m2(Type1 param2, Type2 param2) {...}
  
  var funcSansParametres = new Func<TypeRetour>(m1);
  TypeRetour retour = funcSansParametres.invoke();
  
  var funcAvecParametres = new Func<Type1, Type2, TypeRetour>(m2);
  Type1 param1 = ...;
  Type2 param2 = ...;
  TypeRetour retour = funcAvecParametres.invoke(param1, param2);
  ```

## 13 - Threading

- Thread est un delegate particulier, auquel on peut associer une méthode. 
- `monThread.Start()` démarre l'exécution du thread sans bloquer l'exécution principale
- `Thread.Sleep(<durée en ms>)` met l'exécution du thread courant en pause
- `monThread.Join()` associe le thread à l'exécution principale. Dans un programme console par exemple, lancer un thread parallèle puis faire un `.join()` à la fin du code attendra également la fin du thread parallèle avant de fermer la console

## 14 - Events

- Une bonne façon de formater du texte et des valeurs est d'utiliser la syntaxe `$"Mon nom est {nom}"`

- Si on veut vérifier qu'un objet est d'un certain type, on peut faire le cast simplement de cette façon : 
  ```c#
  Object o = new MonType { MonParametre = "Valeur" };
  if (o is MonType monType) {
      Console.WriteLine(monType.Valeur);
  }
  ```

- On peut appeler le constructeur simplement si on a défini le type de l'instance explicitement : 
  ```c#
  MonType monType = new();
  ```

- Les events permettent d'inscrire des fonctions à un évènement, qui s'exécuteront quand cette évènement surviendra.

  1) Créer un objet qui déclenchera une alerte :
     ```c#
     class LanceurAlerte {
         public event EventHandler? Alerte;
         public void LancerAlerte() {
             Alerte?.Invoke(this, EventArgs.Empty);
         }
     }
     ```

  2) Créer un objet qui réagira à l'alerte :
     ```c#
     class PersonneAttentive {
         public void Reagir(object? sender, EventArgs e) {
             Console.WriteLine("Une alerte a été détectée !");
         }
     }
     ```

  3) Instancier les objets et les abonner à l'alerte :
     ```c#
     LanceurAlerte lanceurAlerte = new();
     
     PersonneAttentive p1 = new();
     PersonneAttentive p2 = new();
     
     lanceurAlerte.Alerte += p1;
     lanceurAlerte.Alerte += p2;
     ```

  4) Attendre que l'alerte soit déclenchée : 
     ```c#
     lanceurAlerte.LancerAlerte();
     ```

## 15 - Generics

- Pour déclarer un objet avec un type générique, comme en Java on utilise `MonType<T>`

- Pour contraindre le type, on peut lui imposer d'implémenter une interface : `MonType<T> where T : IInterface`

- Si on a défini ce `where` pour contraindre à l'interface, on peut définir une classe *alias* pour instancier par défaut une classe `MonType<IInterface>` : 
  ```c#  
  public interface IInterface {}
  public class MonType<T> where T : IInterface {}
  public class MonType : MonType<IInterface> {}
  ```

## 16 - Exceptions

- Syntaxe `try-catch-finally` similaire à Java

- Idem, possibilité d'avoir plusieurs blocs catch pour filtrer selon les types d'erreurs

- Quand on ouvre une ressource dans le try (par exemple avec `File.CreateText()`) il est préférable de terminer toutes les actions liées à cette ressource quoi qu'il arrive. On peut alors placer un `myWriter.Dispose()`

- Il existe une méthode plus élégante pour s'assurer que le `.Dispose()` s'effectue systématiquement : 
  ```c#
  using (TextWriter myWriter = File.CreateText("file.txt")) {...}
  ```

## 17,18,19,20 - Data Hiding

- Si besoin de précision mathématique, type `decimal` est préférable

- Il est possible de surcharger les opérations classiques en utilisant le keywoard `operator` : 
  ```c#
  public static MonType operator + (MonType left, MonType right) {
      return new MonType(left.value + right.value);
  }
  ```

- Parfois utile d'instancier des objets de différentes façons : dans ce cas il suffit de passer le constructeur en private et de créer des méthodes qui l'appellent directement avec new()

-  L'équivalent du `final` de Java en C# est `readonly`. Il ne permet la modification de la valeur que dans le constructeur.


## 21 - Yield

- Il permet de retourner les éléments d'une collection un par un.

- Il conserve l'état d'exécution de la méthode entre chaque itération.

- Il est utile pour des traitements différés ou des calculs paresseux (lazy evaluation), ce qui est important dans le cas où l'on travaille avec de grandes collections ou des flux de données infinis.

- Exemple d'utilisation : 
  ```c#
  IEnumerable<int> GetEvenNumbers(int max) {
      for (int i = 0; i <= max; i++) {
          if (i % 2 == 0) {
              yield return i; // Retourne un nombre pair
          }
      }
  }
  
  ...
      
  foreach (int number in GetEvenNumbers(10)) {
      Console.WriteLine(number);
  }
  
  ```

- Si une méthode a besoin de renvoyer plusieurs valeurs, plusieurs choix s'offrent à nous : 

  - **classe utilitaire** : pour une clarté optimale, l'utilisation "classique" d'une classe possédant tous les champs à retourner est à privilégier

  - **ValueTuple** : En cas de besoin, un tuple peut faire office d'objet temporaire, contenant les champs nécessaires. Pour simplifier la récupération des données, on peut directement variabiliser les valeurs plutôt que le tuple en entier 

    ```c#
    (string name, int age) GetDonnees() {
        return ("Steve", 25);
    }
    
    ...
    
    var donnees = GetDonnees();
    Console.WriteLine($"{donnees.nom} a {donnees.age} ans");
    
    // ou
    
    var (nom, age) = GetDonnees();
    Console.WriteLine($"{nom} a {age} ans");
    ```
___
## LES DIFFERENCES DEPUIS 2018 : 

### 7.0

- Fonctions locales : `int Add(int x, int y) => x + y;`

- Références : 
  ```c#
  int[] numbers = { 1, 2, 3};
  ref int firstElement = ref numbers[0];
  firstElement = 10;
  Console.WriteLine(numbers[0]); // 10
  ```

### 7.2

- Méthodes par défaut dans une interface :
  ```c#
  public interface IMyInterface {
      void MyMethod() => Console.WriteLine("Default implementation");
  }
  
  public class MyClass : IMyInterface {
      // Optionnel : Override si nécessaire
  }
  ```

### 8.0

- Simplification de la syntaxe des switches : 
  ```c#
  public static string GetDayType(DayOfWeek day) {
      return day switch {
          DayOfWeek.Monday or DayOfWeek.Tuesday => "Début de semaine",
          DayOfWeek.Wednesday or DayOfWeek.Thursday => "Milieu de semaine",
          DayOfWeek.Friday => "Fin de semaine",
          _ => "Weekend"
      };
  }
  
  Console.WriteLine(GetDayType(DayOfWeek.Monday));  // "Début de semaine"
  ```

- `tableau[a..b]` retourne un sous-tableau, contenant les éléments de l'index a à b exclus (`[a,b[`)

- `tableau[^a]` retourne le `a`ième élément en partant de la fin (`tableau[^1]` renvoie le dernier élément par exemple)

- L'opérateur de coalescence fonctionne désormais avec l'assignation de valeur : `nullableName ??= "Steve"`

### 9.0

- Ajout d'un type d'objet `record` qui permet de créer des objets immutables avec des getters et les méthodes `ToString`, `Equals` et `GetHashCode` générées par défaut, ainsi que `with` pour créer une copie en modifiant des valeurs : 
  ```c#
  public record Person(string Name, int Age);
  ...
  var personne1 = new Person("John", 30);
  var personne2 = personne1 with { Name = "Steve" };
  ```

- L'ajout du mot clé `init` à la place de `add` pour une propriété permettra de la définir à l'initialisation de l'objet uniquement : 
  ```c#
  public class person {
      public string? Name { get; init; }
  }
  ...
  var personne = new Personne { Name = "Steve" }
  ```

- Pattern-matching amélioré, par exemple pour les switch (voir plus si besoin)

- Possibilité d'appeler une méthode en nommant explicitement les paramètres, permettant de les mettre dans l'ordre que l'on veut : 
  ```c#
  void MaFonction(int valeur, string texte) {...}
  ...
  MaFonction(texte: "blablabla", valeur: 5);
  ```

### 10.0

-  Intégrer le mot-clé `global` avant `using` permet d'importer un fichier ou une bibliothèque dans tout le projet, pour éviter d'avoir à le réimporter.

-  Définition de valeurs par défaut pour les structs : 
   ```c#
   public struct Point {
       public int X;
       public int Y;
   
       public static Point Default => new Point { X = 0, Y = 0 };
   }
   ```

-  Il est possible de passer un nombre variable de paramètres à l'appel d'une fonction avec le mot-clé `params` :
   ```c#
   void PrintNumbers(params int[] numbers) {...}
   ```

### 11.0

- On peut définir une propriété comme `required` pour empêcher l'instanciation sans valoriser la propriété. Il est toujours possible de valoriser à la création avec la syntaxe `new() {}` cependant.

- Format "raw string" qui permet de créer simplement des string multilignes :
  ```
  string rawString = """
  Ceci est une chaîne 
  multiligne avec "des" guillemets.
  """;
  ```

- On peut manipuler les éléments d'un tableau de cette façon :
  ```c#
  List<int> numbers = [...];
  
  // Dans tous les cas, le code vérifie que le tableau n'est pas vide
  // Les noms de variables sont arbitraires
  if (numbers is [var first, ..]) {...} // récupère le premier élément du tableau
  if (numbers is [.., var last]) {...} // récupère le dernier élément du tableau
  if (numbers is [var first, .. var rest]) {...} // récupère le premier élément du tableau ainsi qu'un sous tableau des autres éléments
  if (numbers is [var first, .., var last]) {...} // récupère le premier et le dernier élément du tableau
  if (numbers is [var first, .. var middle, var last]) {...} // récupère le premier et le dernier élément du tableau ainsi qu'un sous tableau des autres éléments
  ```

  On peut combiner le fonctionnement avec d'autres motifs :
  ```c#
  public void ProcessList(object obj) {
      if (obj is List<int> numbers && numbers is [var first, ..]) {
          Console.WriteLine($"Premier élément: {first}");
      }
  }
  ```

- Mot-clé `file` à la place de `public/private/protected` pour restreindre le scope au fichier dans lequel on l'a déclaré

- Pattern matching avec des valeurs de propriétés : 
  ```c#
  if (obj is MonType { Propriete1 = "Steve", Propriete2 = "20" }) {...}
  ```

### 12.0

- Les Alias de type permettent de créer des alias pour des types complexes, simplifiant grandement l'utilisation dans le code :
  ```c#
  using ComplexDict = Dictionary<int, Dictionary<string, List<int>>>;
  ...
  ComplexDict monDict = [];
  monDict[1] = new() { { "key", [1, 2, 3] } };
  ```
___


## À APPROFONDIR

- Les fonctions asynchrones
- Apprendre ASP.NET