Hugo Duperthuy B3IW

J'ai mis des commentaires dans tout les morceaux de code pour faciliter la compréhension.
Un peu compliqué d'expliquer précisemment ici :'|
 

 
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


- Résultats dans le terminal:
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

1. Création de notre extension que l'on integrera à Twig : 'path' -> PathExtension.php
2. Ajout de notre extension à l'environnement Twig -> ligne 77 dans index.php
3. Définition des routes qui "appeleront" leur méthode (leur action), la méthode nous renvoie l'url de notre template correspondant ->  IndexControlleur.php
4. Appelle de la fonction 'path' dans les liens de notre navbar en précisant la route spécifique -> nav.html.twig

## Fin -> Twig : définition d'une extension pour créer des URL dynamiquement




## Essaie : Définition de commandes dans la console

⚠️ Note Importante : Installer la dépendance symfony/console en tapant dans le terminal : "composer require symfony/console"

Ma commande se situe dans src/Command/MyCommand
Avant de faire mon envoie d'email j'ai commencé par faire un simple test pour me renvoyer quelque chose dans le terminal.

Pour utiliser ma commande je devrais faire "php bin/console my:command" mais comme on n'est pas dans un projet full symfony je n'ai pas bin/console 
J'utilise à la place "php src/Command/MyCommand" 

Sauf que j'ai toujours une erreur dans mon terminal :

    ✘ dev@901286130b02  /workspaces/su-12-2023-mvc  php src/Command/MyCommand           
    Xdebug: [Step Debug] Could not connect to debugging client. Tried: localhost:9003 (through xdebug.client_host/xdebug.client_port).
    PHP Fatal error:  Declaration of MyCommand::execute(Symfony\Component\Console\Input\InputInterface $input, Symfony\Component\Console\Output\OutputInterface $output) must be compatible with Symfony\Component\Console\Command\Command::execute(Symfony\Component\Console\Input\InputInterface $input, Symfony\Component\Console\Output\OutputInterface $output): int in /workspaces/su-12-2023-mvc/src/Command/MyCommand on line 19
    PHP Stack trace:
    PHP   1. {main}() /workspaces/su-12-2023-mvc/src/Command/MyCommand:0

    Fatal error: Declaration of MyCommand::execute(Symfony\Component\Console\Input\InputInterface $input, Symfony\Component\Console\Output\OutputInterface $output) must be compatible with Symfony\Component\Console\Command\Command::execute(Symfony\Component\Console\Input\InputInterface $input, Symfony\Component\Console\Output\OutputInterface $output): int in /workspaces/su-12-2023-mvc/src/Command/MyCommand on line 19

    Call Stack:
        0.0020     396904   1. {main}() /workspaces/su-12-2023-mvc/src/Command/MyCommand:0

A priori ça serait car la signature de la méthode execute dans ma classe n'est pas compatible avec celle définie dans la classe parente
Sauf que je n'arrive pas à régler ce problème 

## Fin -> Essaie : Définition de commandes dans la console




## Essaie : Paramètres d'URL

1. Définition de la route qui appele la méthode nous renvoyant l'url de notre template correspondant.
     En joignant notre tableau avec les attributs de notre entité recherché ->  IndexControlleur.php
2. Implémantation de notre twig présentant l'entité et ses attributs -> item.html.twig

## Fin -> Essaie : Paramètres d'URL