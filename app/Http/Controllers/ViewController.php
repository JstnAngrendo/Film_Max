<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function showReviewPage()
    {
        return view('ReviewPage');
    }

    public function showDetailPage()
    {
        return view('DetailPage');
    }
    public function adminForm(){
        return view('AdminForm');
    }
}
