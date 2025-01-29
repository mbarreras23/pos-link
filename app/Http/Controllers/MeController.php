<?php

namespace App\Http\Controllers;

use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Prefix;
use Spatie\RouteAttributes\Attributes\Route;

#[Prefix("me")]
#[Middleware("auth")]
class MeController extends Controller
{
    #[Route("GET", "/", middleware: "can:me.access")]
    public function me()
    {
        return auth()->user()->getEmails();
    }
}
