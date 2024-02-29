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

    public function create(Request $request){
    try {
        $sql=DB::insert(" insert into alumnos(idAlumno,Matricula,Nombre,Edad,Localidad,Cuatrimestre)values(?,?,?,?,?,?) ", [
            $request->idAlumno,
            $request->Matricula,
            $request->Nombre,
            $request->Edad,
            $request->Localidad,
            $request->Cuatrimestre,

        ]);
    } catch (\Throwable $th) {
        $sql =0;
    }

    if ($sql ==true) {
        return back()->with("correcto", "Alumno registrado correctamente");
    } else {
        return back()->with("Incorrecto", "Error al registrar");
    }
        

    }
}