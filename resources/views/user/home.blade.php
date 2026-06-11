<header>
  <h2>SaraZapatos</h2>

  <nav>
    <a href="/home">Inicio</a>
    <a href="#">Productos</a>

    <!-- 👇 USUARIO LOGUEADO -->
    <span style="color:white; margin-left:10px;">
      👤 {{ Auth::user()->name }}
    </span>

    <!-- LOGOUT -->
    <a href="/logout">Salir</a>
  </nav>
</header>