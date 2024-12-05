<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    // Mostrar todos los departamentos (index)
    public function index()
    {
        // Mostrar solo los departamentos no eliminados
        $departamentos = Departamento::withTrashed()->paginate(10);
        return view('departamentos.index', compact('departamentos'));
    }

    // Mostrar el formulario de creación (create)
    public function create()
    {
        return view('departamentos.create');
    }

    // Almacenar un nuevo departamento (store)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:500',
        ]);

        Departamento::create($validated);

        return redirect()->route('departamentos.index')->with('success', 'Departamento creado exitosamente.');
    }

    // Mostrar el formulario de edición (edit)
    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit', compact('departamento'));
    }

    // Actualizar un departamento existente (update)
    public function update(Request $request, Departamento $departamento)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:500',
        ]);

        $departamento->update($validated);

        return redirect()->route('departamentos.index')->with('success', 'Departamento actualizado exitosamente.');
    }

    // Eliminar un departamento (soft delete)
    public function destroy(Departamento $departamento)
    {
        $departamento->delete(); // Esto realiza una eliminación suave
        return redirect()->route('departamentos.index')->with('success', 'Departamento eliminado correctamente.');
    }

    // Restaurar un departamento eliminado (restore)
    public function restore($id)
    {
        $departamento = Departamento::withTrashed()->findOrFail($id);
        $departamento->restore(); // Restaura el departamento

        return redirect()->route('departamentos.index')->with('success', 'Departamento restaurado correctamente.');
    }
}

