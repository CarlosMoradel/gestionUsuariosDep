<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
class AuthController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }
    // Procesar el inicio de sesión
    public function login(Request $request)
    {
        // Validar los datos ingresados
        $request->validate([
            'correo' => 'required|email',
            'contraseña' => 'required|string|min:8',
        ]);
        // Verificar las credenciales
    $usuario = Usuario::where('correo', $request->correo)->first();

    if ($usuario && password_verify($request->contraseña, $usuario->contraseña)) {
        // Iniciar sesión manualmente
        Auth::login($usuario);
        return redirect()->route('welcome')->with('success', 'Inicio de sesión exitoso.');
    } else {
        // Redirigir con mensaje de error si las credenciales son incorrectas
        return back()->with('error', 'Las credenciales son incorrectas. Inténtalo nuevamente.')->withInput();
    }
    }
      /**
     * Logout del usuario.
     */
    public function logout(Request $request)
    {
        Auth::logout();  // Cierra la sesión del usuario
        $request->session()->invalidate();  // Invalida la sesión
        $request->session()->regenerateToken();  // Regenera el token CSRF
        return redirect('/login')->with('success', 'Sesión cerrada exitosamente.');
    }
    
}