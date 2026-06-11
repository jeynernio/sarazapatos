use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

public function login(Request $request)
{
    $credenciales = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credenciales)) {

        $request->session()->regenerate();

        return redirect('/dashboard');
    }

    return back()->with('error', 'Correo o contraseña incorrectos');
}