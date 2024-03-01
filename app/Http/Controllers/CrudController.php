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
    public function update(Request $request){
        try {
            $sql=DB::update(" update alumnos set  Nombre=?, Edad=?, Localidad=?, Cuatrimestre=? where Matricula=? ",[ 
                $request->Nombre,
                $request->Edad,
                $request->Localidad,
                $request->Cuatrimestre,
                $request->Matricula,
            ]);
         if ($sql==0) {
            $sql = 1;
         }
        } catch (\Throwable $th) {
            $sql=0;
        }
        if ($sql ==true) {
            return back()->with("correcto", "Alumno Modificado correctamente");
        } else {
            return back()->with("Incorrecto", "Error al Modificar");
        }

    }
}