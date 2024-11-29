<?php

use App\Controllers\Dashboard\DashboardController;
use App\Controllers\Dashboard\CriarController;
use App\Controllers\Dashboard\EditarController;
use App\Controllers\Dashboard\DeletarController;
use App\Controllers\Dashboard\VisualizarController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\RegisterController;
use App\Middlewares\GuestMiddleware;
use App\Middlewares\AuthMiddleware;
use Core\Route;

(new Route)

    // auth
    ->get('/', DashboardController::class, AuthMiddleware::class)
    ->get('/dashboard', DashboardController::class, AuthMiddleware::class)
    ->get('/dashboard/criar-contato', CriarController::class, AuthMiddleware::class)
    ->post('/dashboard/criar-contato', [CriarController::class, 'criar'], AuthMiddleware::class)
    ->get('/dashboard/editar-contato', EditarController::class, AuthMiddleware::class)
    ->post('/dashboard/editar-contato', [EditarController::class, 'editar'], AuthMiddleware::class)
    ->get('/dashboard/deletar-contato', DeletarController::class, AuthMiddleware::class)
    ->get('/dashboard/visualizar', VisualizarController::class, AuthMiddleware::class)
    ->post('/dashboard/visualizar', [VisualizarController::class, 'mostrar'], AuthMiddleware::class)
    ->get('/logout', LogoutController::class, AuthMiddleware::class)


    //guest
    ->get('/login', [LoginController::class, 'index'], GuestMiddleware::class)
    ->post('/login', [LoginController::class, 'logar'], GuestMiddleware::class)
    ->get('/registrar', [RegisterController::class, 'index'], GuestMiddleware::class)
    ->post('/registrar', [RegisterController::class, 'registrar'], GuestMiddleware::class)
    ->run();
