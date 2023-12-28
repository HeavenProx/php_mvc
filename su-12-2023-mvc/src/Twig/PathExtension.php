<?php 

// src/Twig/PathExtension.php
namespace App\Twig;

use App\Routing\Exception\RouteNotFoundException;
use App\Routing\Router;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

// Herite d'une classe de base fouri par Twig spécialement pour les extensions 
class PathExtension extends AbstractExtension
{
    private Router $router;

    // Constructeur
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    // Defini une fonction qui sera ajoute a Twig 
    // Retourne un tableau contenant une instance de TwigFunction
    // La fonction se nomme 'path' et va retourner le resultat de la methode generatePath
    public function getFunctions(): array
    {
        return [
            new TwigFunction('path', [$this, 'generatePath']),
        ];
    }

    // Prend le nom de la route et retourne l'url
    public function generatePath(string $routeName): string
    {
        foreach ($this->router->getRoutes() as $route) {
            if ($route->getName() === $routeName) {
                return $route->getUri();
            }
        }

        // Sinon retourne l'exception de route non trouve
        throw new RouteNotFoundException("Route '$routeName' not found.");
    }
}