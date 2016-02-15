<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function getLogin()
    {
        $data = [
            'email' => 'henrique@admin.com',
            'password' => 123456
        ];

        //echo Auth::user()->name;
        return Auth::user();

        if(Auth::attempt($data)) {
            return 'logou';
        }


        if(Auth::check()) {
            return 'logado';
        }

        return 'falhou';
    }

    public function getLogout()
    {
        Auth::logout();

        if(Auth::check()) {
            return 'logado';
        }

        return 'Não está logado';
    }

    public function getExemplo()
    {
        // test/exemplo

        return 'oi';
    }

    public function getExemploSuper()
    {
        // test/exemplo-super

        return 'oi2';
    }

    public function postExemplo()
    {
        return 'OI';
    }

}
