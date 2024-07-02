<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\EstudianteGrupo;
use App\Models\Grupo;
use Illuminate\Http\Request;

class EstudianteGrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = EstudianteGrupo::query();

        if($request->has('Id_estudiante') && is_numeric($request->Id_estudiante)){
            $request->where('Id_estudiante', '=', $request->Id_estudiante);
        }
        $estudiantesGrupos = $query->with('estudiante', 'grupo')
            ->orderBy('id', 'desc')
            ->simplePaginate(10);
        $estudiantesGrupos = $query->orderBy('id', 'desc')->simplePaginate(10);

        $estudiantes = Estudiante::all();

        return view('estudiantes_grupos.index', compact('estudiantesGrupos', 'estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estudiantes = Estudiante::all();
        $grupos = Grupo::all();
        return view('estudiantes_grupos.create', compact('docentes', 'grupos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $estudianteGrupo = EstudianteGrupo::create($request->all());
        return redirect()->route('estudiantes_grupos.index')->with('success', 'Estudiante grupo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estudianteGrupo = EstudianteGrupo::find($id);

        if(!$estudianteGrupo){
            return abort(404);
        }

        return view('estudiantes_grupos.show', compact('estudianteGrupo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $estudianteGrupo = EstudianteGrupo::find($id);

        if(!$estudianteGrupo){
            return abort(404);
        }
        $estudiantes = Estudiante::all();
        $grupos = Grupo::all();

        return view('docentes_grupos.edit', compact('estudianteGrupo', 'estudiantes', 'grupos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $estudianteGrupo = EstudianteGrupo::find($id);

        if(!$estudianteGrupo){
            return abort(404);
        }

        $estudianteGrupo->Id_estudiante = $request->Id_estudiante;
        $estudianteGrupo->Id_grupo = $request->Id_grupo;

        $estudianteGrupo->save();

        return redirect()->route('estudiantes_grupos.index')->with('success', 'Estudiante grupo actualizado correctamente.');
    }

    public function delete($id)
    {
        $estudianteGrupo = EstudianteGrupo::find($id);

        if(!$estudianteGrupo){
            return abort(404);
        }
        return view('estudiantes_grupos.delete', compact('estudianteGrupo'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estudianteGrupo = EstudianteGrupo::find($id);
        if(!$estudianteGrupo){
            return abort(404);
        }

        $estudianteGrupo->delete();
        return redirect()->route('estudiantes_grupos.index')->with('success', 'Estudiante grupo eliminado correctamente');
    }
}