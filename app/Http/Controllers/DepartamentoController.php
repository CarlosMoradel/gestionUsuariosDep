<?php
namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    // Mostrar todos los departamentos (index)
    public function index()
    {
        $departamentos = Departamento::paginate(10);  // Paginación de 10 departamentos por página
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
        // Validar los datos
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:500',
        ]);

        // Crear el departamento
        Departamento::create($validated);

        // Redirigir a la lista de departamentos
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
        // Validar los datos
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:500',
        ]);

        // Actualizar el departamento
        $departamento->update($validated);

        // Redirigir a la lista de departamentos
        return redirect()->route('departamentos.index')->with('success', 'Departamento actualizado exitosamente.');
    }

    // Eliminar un departamento (destroy)
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();

        return redirect()->route('departamentos.index')->with('success', 'Departamento eliminado exitosamente.');
    }
}
