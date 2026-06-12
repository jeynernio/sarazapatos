<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SaraZapatos | Sneakers Premium</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('backend/assets/styles.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700;900&display=swap" rel="stylesheet">
</head>

<body>

<!-- HEADER -->
<header>
  <h2>SaraZapatos</h2>
  <nav>
    <a onclick="scrollToSection('hero')">Inicio</a>
    <a onclick="scrollToSection('beneficios')">Beneficios</a>
    <a onclick="scrollToSection('productos')">Productos</a>
    <a onclick="scrollToSection('resenas')">Reseñas</a>
    <a onclick="scrollToSection('contacto')">Contacto</a>
    <a href="/login">Login</a>
    <a href="/registro">Registrase</a>
  </nav>
</header>

<!-- HERO -->
<section id="hero" class="hero">

  <div class="hero-overlay"></div>

  <div class="hero-content">

    <span class="tag">🔥 Envíos en todo Nicaragua</span>

    <h1>Camina con estilo. Destaca en cada paso.</h1>

    <p>
      Sneakers modernos, cómodos y originales para quienes quieren verse bien todos los días.
    </p>

    <div class="hero-buttons">
      <button class="btn" onclick="scrollToSection('productos')">Ver colección</button>
      <button class="btn outline" onclick="openWhatsApp()">Comprar por WhatsApp</button>
    </div>

  </div>

</section>

<!-- BENEFICIOS -->
<section id="beneficios" class="section">

  <h2>¿Por qué elegirnos?</h2>
  <p class="subtitle">Descubre por qué somos la mejor opción para tu estilo y comodidad</p>

  <div class="grid-3">

    <div class="box">
      <div class="icon"></div>
      <h3>Calidad Premium</h3>
      <p>
        Utilizamos materiales de alta resistencia y acabados de primera calidad.
        Nuestros productos están diseñados para durar, brindándote comodidad
        y estilo en cada paso que das.
      </p>
      <span class="extra">Durabilidad garantizada</span>
    </div>

    <div class="box">
      <div class="icon"></div>
      <h3>Envíos rápidos</h3>
      <p>
        Realizamos entregas seguras y rápidas en todo Nicaragua.
        Recibe tu pedido en tiempo récord con seguimiento incluido
        para tu tranquilidad.
      </p>
      <span class="extra">Entregas confiables</span>
    </div>

    <div class="box">
      <div class="icon"></div>
      <h3>Precios accesibles</h3>
      <p>
        Ofrecemos productos de estilo premium a precios competitivos.
        Creemos que la calidad no debe ser costosa, por eso ajustamos
        nuestros precios para ti.
      </p>
      <span class="extra">Mejor relación calidad-precio</span>
    </div>

  </div>

</section>




<!-- PRODUCTOS -->
<section id="productos" class="section dark">

  <h2>Zapatos Mas Vendidos</h2>

  <div class="grid">

    <div class="card">
      <img src="{{ asset('backend/assets/Imagenes/1.jpeg')}}">
      <h3>Nike Air Hombre</h3>
      <p>C$ 4000</p>
      <button class="btn" onclick="openWhatsApp()">Comprar</button>
    </div>

    <div class="card">
      <img src="{{ asset('backend/assets/Imagenes/2.jpeg')}}">
      <h3>Urban Max</h3>
      <p>$68</p>
      <button class="btn" onclick="openWhatsApp()">Comprar</button>
    </div>

    <div class="card">
      <img src="{{ asset('backend/assets/Imagenes/3.jpeg')}}">
      <h3>Runner Pro X</h3>
      <p>$85</p>
      <button class="btn" onclick="openWhatsApp()">Comprar</button>
    </div>

  </div>
  



  <div class="grid">

    <div class="card">
      <img src="{{ asset('backend/assets/Imagenes/4.jpeg')}}">
      <h3>Addidas Zamba</h3>
      <p>C$ 3600</p>
      <button class="btn" onclick="openWhatsApp()">Comprar</button>
    </div>

    <div class="card">
      <img src="{{ asset('backend/assets/Imagenes/5.jpeg')}}">
      <h3>Converse Blancos Dama</h3>
      <p>C$ 3200</p>
      <button class="btn" onclick="openWhatsApp()">Comprar</button>
    </div>

    <div class="card">
      <img src="{{ asset('backend/assets/Imagenes/6.jpeg')}}">
      <h3>Runner Pro X</h3>
      <p>$85</p>
      <button class="btn" onclick="openWhatsApp()">Comprar</button>
    </div>

  </div>

</section>

<!-- TESTIMONIOS -->
<section id="resenas" class="section">

</section>
<form class="review-form" action="{{ route('resena.guardar') }}" method="POST">

  @csrf

  <h3>Deja tu reseña</h3>

  <input type="text" name="nombre" placeholder="Tu nombre" required>

  <select name="estrellas">
    <option value="5">⭐⭐⭐⭐⭐ - Excelente</option>
    <option value="4">⭐⭐⭐⭐ - Muy bueno</option>
    <option value="3">⭐⭐⭐ - Bueno</option>
    <option value="2">⭐⭐ - Regular</option>
    <option value="1">⭐ - Malo</option>
  </select>

  <textarea name="comentario" placeholder="Escribe tu opinión..." required></textarea>

  <button type="submit" class="btn">Publicar reseña</button>

</form>


<section id="contacto" class="contact-section">

  <div class="contact-wrapper">

    <!-- IZQUIERDA -->
    <div class="contact-info">

      <span class="tag">Conéctate con nosotros</span>

      <h2>Estamos para ayudarte</h2>

      <p>
        Contáctanos para hacer tu pedido, resolver dudas o recibir atención rápida por WhatsApp.
      </p>

      <div class="info-item">📞 +505 89455281</div>
      <div class="info-item">✉️ ventas@sarazapatos.com</div>
      <div class="info-item">📍 Nicaragua</div>
      <div class="info-item">⏰ Lun - Sáb: 8:00 - 6:00</div>

    </div>

    

<form class="contact-card" action="{{ route('contacto.guardar') }}" method="POST">

    @csrf

    <input type="text" name="nombre" placeholder="Nombre completo" required>

    <input type="email" name="correo" placeholder="Correo electrónico" required>

    <input type="text" name="telefono" placeholder="Teléfono">

    <textarea name="mensaje" placeholder="Mensaje o comentario..." required></textarea>

    <button type="submit" class="btn">Enviar mensaje </button>

</form>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

  </div>

</section>

<!-- CTA FINAL -->
<section class="cta">

  <h2>¿Listo para mejorar tu estilo?</h2>
  <p>Escríbenos ahora y recibe atención inmediata</p>

  <button class="btn" onclick="openWhatsApp()">Hablar por WhatsApp</button>

    <!-- REDES SOCIALES -->
<!-- REDES SOCIALES -->
<div class="social-buttons">

    <!-- Facebook -->
    <a href="https://www.facebook.com/profile.php?id=61589495230729" target="_blank" class="social-btn facebook">
        <i class="fab fa-facebook-f"></i> Facebook
    </a>

    <!-- Instagram -->
    <a href="https://www.instagram.com/sarazapatos_oficial?utm_source=qr&igsh=MXE0MHBwYTE1a25lag==" target="_blank" class="social-btn instagram">
        <i class="fab fa-instagram"></i> Instagram
    </a>

    <!-- WhatsApp -->
    <a href="https://wa.me/50589455281" target="_blank" class="social-btn whatsapp">
        <i class="fab fa-whatsapp"></i> WhatsApp
    </a>

</div>

</section>

<!-- FOOTER -->
<footer>
  
  <p>© 2026 SaraZapatos - Todos los derechos reservados</p>
</footer>


<script src="{{ asset('backend/assets/app.js')}}">

</script>

</body>
</html>

