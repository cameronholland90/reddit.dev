<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function showWelcome() {
        return view('welcome');
    }

    public function rollDice($guess = 3) {
        $random = mt_rand(1, 6);
        if ($random == $guess) {
            $message = 'You Guessed Correctly';
        } else {
            $message = 'You Guessed Wrong';
        }

        $data = compact('message', 'random', 'guess');

        return view('roll-dice')->with($data);
    }
}
