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
            $affectedRows = DB::update("UPDATE alumnos SET Matricula=?, Nombre=?, Edad=?, Localidad=?, Cuatrimestre=? WHERE idAlumno=?", [ 
                $request->Matricula,
                $request->Nombre,
                $request->Edad,
                $request->Localidad,
                $request->Cuatrimestre,
                $request->idAlumno,
            ]);
    
            if ($affectedRows > 0) {
                return back()->with("correcto2", "Alumno modificado correctamente");
            } else {
                return back()->with("incorrecto2", "No se encontró ningún alumno para modificar");
            }
        } catch (\Throwable $th) {
            return back()->with("incorrecto3", "Error al modificar el alumno");
        }
    }
    
    public function delete($id){   
        try {
            $sql=DB::delete(" delete from alumnos where idAlumno= $id ");
           
        } catch (\Throwable $th) {
            $sql=0;
        }
        if ($sql ==true) {
            return back()->with("correcto4", "Alumno eliminado correctamente");
        } else {
            return back()->with("incorrecto4", "Error al Eliminar");
        }
}
}
