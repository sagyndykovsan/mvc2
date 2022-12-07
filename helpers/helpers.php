<?php 

declare(strict_types=1);

use App\View;

function view(string $viewPath, array $parameters = []): View {
    return new View($viewPath, $parameters);
}