<?php

use App\Controllers\HomeController;
use App\Controllers\ServicesController;
use App\Controllers\ContactController;
use App\Controllers\CardController;
use App\Controllers\LangController;
use App\Controllers\Admin\AuthController;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\ServicesController as AdminServicesController;
use App\Controllers\Admin\ContactsController;
use App\Controllers\Admin\SettingsController;

// ── Public ────────────────────────────────────────────────
$router->get('/',                     [HomeController::class,    'index']);
$router->get('/servicios',            [ServicesController::class, 'index']);
$router->get('/servicios/{slug}',     [ServicesController::class, 'show']);
$router->get('/contacto',             [ContactController::class,  'index']);
$router->post('/contacto',            [ContactController::class,  'store']);
$router->get('/card',                 [CardController::class,     'index']);
$router->get('/lang/{code}',          [LangController::class,     'switch']);

// ── Admin auth ────────────────────────────────────────────
$router->get('/admin',                [AuthController::class,    'index']);
$router->get('/admin/login',          [AuthController::class,    'loginForm']);
$router->post('/admin/login',         [AuthController::class,    'login']);
$router->post('/admin/logout',        [AuthController::class,    'logout']);

// ── Admin dashboard ───────────────────────────────────────
$router->get('/admin/dashboard',      [DashboardController::class, 'index']);

// ── Admin services ────────────────────────────────────────
$router->get('/admin/servicios',                    [AdminServicesController::class, 'index']);
$router->get('/admin/servicios/crear',              [AdminServicesController::class, 'create']);
$router->post('/admin/servicios',                   [AdminServicesController::class, 'store']);
$router->get('/admin/servicios/{id}/editar',        [AdminServicesController::class, 'edit']);
$router->post('/admin/servicios/{id}',              [AdminServicesController::class, 'update']);
$router->post('/admin/servicios/{id}/eliminar',     [AdminServicesController::class, 'destroy']);

// ── Admin contacts ────────────────────────────────────────
$router->get('/admin/contactos',                    [ContactsController::class, 'index']);
$router->get('/admin/contactos/{id}',               [ContactsController::class, 'show']);
$router->post('/admin/contactos/{id}/eliminar',     [ContactsController::class, 'destroy']);

// ── Admin settings ────────────────────────────────────────
$router->get('/admin/configuracion',  [SettingsController::class, 'index']);
$router->post('/admin/configuracion', [SettingsController::class, 'update']);
