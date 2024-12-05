<?php 
namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Departamento;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Método para mostrar todos los usuarios (index)
    public function index()
    {
        $usuarios = Usuario::withTrashed()->paginate(10); // Muestra todos los usuarios, incluidos los eliminados
        return view('usuarios.index', compact('usuarios'));
    }

    // Método para mostrar el formulario de crear usuario (create)
    public function create()
    {
        $departamentos = Departamento::all();  // Obtener todos los departamentos
        return view('usuarios.create', compact('departamentos'));
    }

    // Método para almacenar un nuevo usuario (store)
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'correo' => 'required|email|unique:usuarios',
            'telefono' => 'required|max:15',
            'direccion' => 'required|max:255',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);


        // Crear el usuario
        Usuario::create($validated);

        // Redirigir a la lista de usuarios
        return redirect()->route('usuarios.index');
    }

    // Método para mostrar el formulario de edición de un usuario (edit)
    public function edit(Usuario $usuario)
    {
        $departamentos = Departamento::all();  // Obtener todos los departamentos
        return view('usuarios.edit', compact('usuario', 'departamentos'));
    }

    // Método para actualizar un usuario (update)
    public function update(Request $request, Usuario $usuario)
    {
        // Validar los datos
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'correo' => 'required|email|unique:usuarios,correo,' . $usuario->id,
            'telefono' => 'required|max:15',
            'direccion' => 'required|max:255',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);


        // Actualizar el usuario
        $usuario->update($validated);

        // Redirigir a la lista de usuarios
        return redirect()->route('usuarios.index');
    }

    // Método para eliminar un usuario (destroy)
    public function destroy($id)
{
    $usuario = Usuario::findOrFail($id);
    $usuario->delete(); // Esto marca al usuario como eliminado, no lo elimina permanentemente.

    return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
}
    
public function restore($id)
{
    $usuario = Usuario::withTrashed()->findOrFail($id);
    $usuario->restore(); // Restaura el usuario

    return redirect()->route('usuarios.index')->with('success', 'Usuario restaurado correctamente.');
}
    
}