<?php

namespace App\Http\Controllers;

use App\Models\materia;
use App\Models\profesor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class profesorController extends Controller
{
    public function index()
    {
        $profesores=DB::table('profesores')
                        ->join('materias','profesores.materias','=','materias.id')
                        ->select('profesores.id','profesores.nombre as nombre','profesores.apPaterno','profesores.apMaterno','profesores.correo','profesores.telefono','materias.nombre as materias')
                        ->get();
                        
        return view('Profesores',['profesores'=>$profesores]);
    }

    public function nueva()
    {
        $profesores=null;
        $materias=materia::all();
        $materiasA=null;
        return view('Profesor',['profesor'=>$profesores,'materias'=>$materias,'materiasP'=>$materiasA]);
    }

    public function agregar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:30',
            'apPaterno'=>'required|max:30',
            'apMaterno'=>'required|max:30',
            'telefono' => 'required|numeric',
            'correo'=>'required|max:30',
            'materias'=>'required'
        ], [
            'required' => 'El :attribute es requerido',
            'numeric' => 'El elemento :attribute no es un Numero',
            'max'=> 'te has pasado el limite de :attribute'
        ])->validate();

        $profesores=new profesor();
        $profesores->nombre=$request->nombre;
        $profesores->apPaterno=$request->apPaterno;
        $profesores->apMaterno=$request->apMaterno;
        $profesores->telefono=$request->telefono;
        $profesores->correo=$request->correo;
        $profesores->materias=$request->materias;
        $profesores->save();
        return redirect('profesor');
    }

    public function editar(Request $request)
    {
        $profesores = profesor::find($request->id);
        $materias=materia::all();
        return view('Profesor', ['profesor' => $profesores,'materias'=>$materias]);
    }
    public function actualizar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:30',
            'apPaterno'=>'required|max:30',
            'apMaterno'=>'required|max:30',
            'telefono' => 'required|numeric',
            'correo'=>'required|max:30',
            'materias'=>'required'
        ], [
            'required' => 'El :attribute es requerido',
            'max'=> 'te has pasado el limite de :attribute'
        ])->validate();
        $profesores=new profesor();
        $profesores = profesor::find($request->id);
        $profesores->nombre=$request->nombre;
        $profesores->apPaterno=$request->apPaterno;
        $profesores->apMaterno=$request->apMaterno;
        $profesores->telefono=$request->telefono;
        $profesores->correo=$request->correo;
        $profesores->materias=$request->materias;
        $profesores->save();
        return redirect('profesor');
    }
    public function eliminar(Request $request)
    {
        $profesores=new profesor();
        $profesores=profesor::find($request->id);
        $profesores->delete();
        return redirect('profesor');
    }
}
