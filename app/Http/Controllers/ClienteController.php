<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    
    public function index()
    {

        echo "hello world!";

        return view('./clientes');

    }


}