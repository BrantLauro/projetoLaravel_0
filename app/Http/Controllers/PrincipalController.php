<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index() {
        $motivosContato = [
            1 => "Dúvidas",
            2 => "Elogio",
            3 => "Reclamação"
        ];
       return view("site.principal", ["motivosContato"=> $motivosContato]);
    }
}
