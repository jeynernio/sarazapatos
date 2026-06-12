
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Iniciar Sesión</title>

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
    box-shadow:0 10px 30px rgba(0,0,0,.4);
}

h1{
    color:#fff;
    text-align:center;
    margin-bottom:10px;
}

.subtitulo{
    text-align:center;
    color:#94a3b8;
    margin-bottom:25px;
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
    font-size:15px;
}

.input-group input::placeholder{
    color:#94a3b8;
}

.input-group input:focus{
    outline:2px solid #3b82f6;
}

.btn{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    background:linear-gradient(135deg,#2563eb,#7c3aed);
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:.3s;
}

.btn:hover{
    transform:translateY(-2px);
}

.alerta-error{
    background:#7f1d1d;
    color:white;
    padding:12px;
    border-radius:10px;
    margin-bottom:15px;
}

.alerta-exito{
    background:#14532d;
    color:white;
    padding:12px;
    border-radius:10px;
    margin-bottom:15px;
}

.error{
    color:#ef4444;
    font-size:13px;
    margin-top:5px;
    display:block;
}

.footer{
    text-align:center;
    margin-top:20px;
    color:#94a3b8;
}

.footer a{
    color:#60a5fa;
    text-decoration:none;
}
</style>
</head>

<body>

<div class="card">
<a href="/welcome" style="font-size: 24px; font-weight: bold; text-decoration: none; color: #ffffff;">&times;</a>
    <h1>Iniciar Sesión</h1>
    
    <p class="subtitulo">Ingresa tus credenciales</p>

    @if(session('success'))
        <div class="alerta-exito">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alerta-error">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alerta-error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf

        <div class="input-group">
            <input
                type="email"
                name="email"
                placeholder="Correo electrónico"
                value="{{ old('email') }}"
                required>
        </div>

        <div class="input-group">
            <input
                type="password"
                name="password"
                placeholder="Contraseña"
                required>
        </div>
        

        <button type="submit" class="btn">
            Ingresar
        </button>
        
    </form>

    <div class="footer">
        ¿No tienes cuenta?
        <a href="/registro">Crear una cuenta</a>
    </div>

</div>

</body>
</html>

