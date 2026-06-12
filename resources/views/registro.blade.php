
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#0f172a;
}

.card{
    width:420px;
    padding:40px;
    background:rgba(255,255,255,.05);
    border:1px solid rgba(255,255,255,.1);
    backdrop-filter:blur(15px);
    border-radius:20px;
}

h1{
    color:white;
    text-align:center;
    margin-bottom:20px;
}

.input-group{
    margin-bottom:15px;
}

.input-group input{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    background:#1e293b;
    color:white;
}

.input-group input::placeholder{
    color:#94a3b8;
}

.error{
    color:#ef4444;
    font-size:13px;
    margin-top:5px;
    display:block;
}

.alert{
    background:#7f1d1d;
    color:white;
    padding:12px;
    border-radius:10px;
    margin-bottom:15px;
}

.success{
    background:#14532d;
    color:white;
    padding:12px;
    border-radius:10px;
    margin-bottom:15px;
}

.btn{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    background:linear-gradient(135deg,#2563eb,#7c3aed);
    color:white;
    cursor:pointer;
}
</style>
</head>
<body>

<div class="card">
<a href="/login" style="font-size: 24px; font-weight: bold; text-decoration: none; color: #ffffff;">&times;</a>
    <h1>Crear Cuenta</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <div class="input-group">
            <input type="text"
                   name="nombre"
                   placeholder="Nombre"
                   value="{{ old('nombre') }}"
                   required>

            @error('nombre')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-group">
            <input type="text"
                   name="apellido"
                   placeholder="Apellido"
                   value="{{ old('apellido') }}"
                   required>

            @error('apellido')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-group">
            <input type="email"
                   name="email"
                   placeholder="Correo electrónico"
                   value="{{ old('email') }}"
                   required>

            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-group">
            <input type="text"
                   name="telefono"
                   placeholder="Teléfono"
                   value="{{ old('telefono') }}">
        </div>

        <div class="input-group">
            <input type="password"
                   name="password"
                   placeholder="Contraseña"
                   required>

            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn">
            Registrarse
        </button>
    </form>

</div>

</body>
</html>

