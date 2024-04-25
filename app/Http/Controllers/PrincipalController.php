<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index() {
        $motivosContato = MotivoContato::all();
       return view("site.principal", compact("motivosContato"));
    }
}
