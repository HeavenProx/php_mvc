<?php 

// src/Twig/PathExtension.php
namespace App\Twig;

use App\Routing\Exception\RouteNotFoundException;
use App\Routing\Router;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PathExtension extends AbstractExtension
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('path', [$this, 'generatePath']),
        ];
    }

    public function generatePath(string $routeName): string
    {
        foreach ($this->router->getRoutes() as $route) {
            if ($route->getName() === $routeName) {
                return $route->getUri();
            }
        }

        throw new RouteNotFoundException("Route '$routeName' not found.");
    }
}