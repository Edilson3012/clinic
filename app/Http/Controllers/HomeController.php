<?php

namespace App\Http\Controllers;

use App\Models\MedicalAppointment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // die('salve');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $qtdConsulta = count(MedicalAppointment::all());

        return view('pages.dashboard', [
            'qtdConsulta' => $qtdConsulta
        ]);
    }
}
