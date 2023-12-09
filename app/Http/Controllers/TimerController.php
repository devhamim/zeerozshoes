<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimerController extends Controller
{
    //timer_add
    function timer_add() {
        return view('backend.product.product_timer');
    }
}
