<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormWizardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     */
    public function wizard(Request $request):void
    {
        dd($request->all());
    }
}
