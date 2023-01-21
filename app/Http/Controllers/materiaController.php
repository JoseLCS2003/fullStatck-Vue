<?php

namespace App\Http\Controllers;

use App\Models\materia;
use App\Models\profesor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;


class materiaController extends Controller
{
    public function index()
    {
        $materias = materia::all();
        return Inertia::render('Materias-Profesor/Materias',['materias'=>$materias]);
    }

    public function nueva()
    {
        $materias = null;
        return Inertia::render('Materias-Profesor/FormularioMateria');
    }

    public function agregar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:30',
            'unidades' => 'required|numeric'
        ], [
            'required' => 'El :attribute es requerido',
            'numeric' => 'El elemento :attribute no es un Numero',
            'max'=> 'te has pasado el limite'
        ])->validate();

        $materias = new materia();
        $materias->nombre = $request->nombre;
        $materias->unidades = $request->unidades;
        $materias->save();
        return to_route('materia');
    }

    public function editar(Request $request)
    {
        $materias = materia::find($request->id);
        return view('Materia', ['materia' => $materias]);
    }
    public function actualizar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:30',
            'unidades' => 'required|numeric'
        ], [
            'required' => 'El :attribute es requerido',
            'numeric' => 'El elemento :attribute no es un Numero',
            'max'=> 'te has pasado el limite'
        ])->validate();

        $materias = new materia();
        $materias = materia::find($request->id);
        $materias->nombre = $request->nombre;
        $materias->unidades = $request->unidades;
        $materias->save();
        return redirect('materia');
    }
    public function eliminar(Request $request)
    {
        $materias = new materia();
        $materias = materia::find($request->id);
        $materias->delete();
        return redirect('materia');
    }

    public function verProfesores(Request $request)
    {
        $materia=materia::find($request->id);
        $profesores=DB::table('profesores')
                        ->join('materias','profesores.materias','=','materias.id')
                        ->select('profesores.id as id','profesores.nombre as nombre','profesores.apPaterno','profesores.apMaterno','profesores.correo','profesores.telefono','materias.nombre as materias')
                        ->where('materias.id','=',$materia->id)
                        ->get();
        return view('Profesores',['materiaProfesor'=>$profesores,'materia'=>$materia]);
    }
    public function nuevoProfe(Request $request)
    {
        $materia=materia::all();
        $materiaP=materia::find($request->id);
        $profesor=null;
        return view('Profesor',['profesor'=>null,'materias'=>$materia,'materiasP'=>$materiaP]);
    }
    public function agregarMateriaProfe(Request $request)
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
}
