<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index(){
        $datos=DB::select("SELECT * FROM alumnos ");
        return view("welcome") -> with("datos",$datos);
    } 
}
