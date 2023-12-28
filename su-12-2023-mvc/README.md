 ## Test Unitaires 

⚠️ Note Importante : Installer la dépendance phpunit en tapant dans le terminal "composer require --dev phpunit/phpunit"

Le projet intègre des tests unitaires pour garantir le bon fonctionnement de chaque méthode de manière isolée. 
 
- Création d'un fichiers tests regroupant 2 classes de test :
    - ContainerTest.php pour tester les méthodes get() et set() de Container.php
    - RouterTest.php pour tester addRoute(), getRoute() et getRoutes()

- Exécuter les tests unitaires :

    - ContainerTest.php : 
        Dans le terminal : 
        ```bash
        vendor/bin/phpunit tests/ContainerTest
        ```

     - RouterTest.php :
        Dans le terminal : 
        ```bash
        vendor/bin/phpunit tests/RouterTest
        ```


- Résultats :
    - ContainerTest.php : 

        dev@901286130b02  /workspaces/su-12-2023-mvc   main ±  vendor/bin/phpunit tests/ContainerTest
        Xdebug: [Step Debug] Could not connect to debugging client. Tried: localhost:9003 (through xdebug.client_host/xdebug.client_port).
        PHPUnit 10.5.3 by Sebastian Bergmann and contributors.

        Runtime:       PHP 8.2.11

        ..                                                                  2 / 2 (100%)

        Time: 00:00.304, Memory: 8.00 MB

        OK (2 tests, 3 assertions)

    - RouterTest.php :

        dev@901286130b02  /workspaces/su-12-2023-mvc   main ±  vendor/bin/phpunit tests/RouterTest
        Xdebug: [Step Debug] Could not connect to debugging client. Tried: localhost:9003 (through xdebug.client_host/xdebug.client_port).
        PHPUnit 10.5.3 by Sebastian Bergmann and contributors.

        Runtime:       PHP 8.2.11

        ...                                                                 3 / 3 (100%)

        Time: 00:00.461, Memory: 8.00 MB

        OK (3 tests, 6 assertions)


    On peut conclure que tout les tests (les 5) ont été réussi avec succès !
    Nos méthodes se comporte comme prévues 
    
## Fin -> tests unitaires


## Twig : définition d'une extension pour créer des URL dynamiquement

J'ai mis des commentaires dans tout les morceaux de code pour faciliter la compréhension.
Un peu compliqué d'expliquer précisemment ici :'|

1. Création de notre extension que l'on integrera à Twig : 'path' -> PathExtension.php
2. Ajout de notre extension à l'environnement Twig -> ligne 77 dans index.php
3. Définition des routes qui "appeleront" leur méthode (leur action), la méthode nous renvoie l'url de notre template correspondant ->  IndexControlleur.php
4. Appelle de la fonction 'path' dans les liens de notre navbar en précisant la route spécifique -> nav.html.twig

## Fin -> Twig : définition d'une extension pour créer des URL dynamiquement

