<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoesZone | Premium Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Variables de Tema (Claro por defecto) */
        :root {
            --bg-principal: #f8fafc;
            --bg-card: #ffffff;
            --bg-input: #f1f5f9;
            --texto-principal: #0f172a;
            --texto-secundario: #64748b;
            --color-accento: #6366f1;
            --color-accento-hover: #4f46e5;
            --borde: #e2e8f0;
            --shadow: 0 4px 20px rgba(15, 23, 42, 0.05);
            --bg-carrito: rgba(255, 255, 255, 0.95);
            --overlay: rgba(15, 23, 42, 0.4);
        }

        /* Variables para Modo Oscuro */
        [data-theme="dark"] {
            --bg-principal: #0f172a;
            --bg-card: #1e293b;
            --bg-input: #334155;
            --texto-principal: #f8fafc;
            --texto-secundario: #94a3b8;
            --color-accento: #818cf8;
            --color-accento-hover: #6366f1;
            --borde: #334155;
            --shadow: 0 4px 25px rgba(0, 0, 0, 0.3);
            --bg-carrito: rgba(30, 41, 59, 0.98);
            --overlay: rgba(0, 0, 0, 0.6);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }

        body {
            background-color: var(--bg-principal);
            color: var(--texto-principal);
            padding-bottom: 60px;
        }

        /* --- NAVBAR --- */
        .navbar {
            background-color: var(--bg-card);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 5%;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: var(--shadow);
            border-bottom: 1px solid var(--borde);
        }

        .logo {
            font-size: 22px;
            font-weight: 800;
            color: var(--color-accento);
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .welcome-title {
            font-size: 16px;
            color: var(--texto-principal);
            margin: 0;
            font-weight: 600;
        }

        .theme-toggle-btn {
            background: none;
            border: 1px solid var(--borde);
            color: var(--texto-principal);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .theme-toggle-btn:hover {
            border-color: var(--color-accento);
            color: var(--color-accento);
        }

        .cart-icon {
            position: relative;
            font-size: 18px;
            color: var(--texto-principal);
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid var(--borde);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cart-icon:hover {
            border-color: var(--color-accento);
            color: var(--color-accento);
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #ef4444;
            color: white;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 10px;
            font-weight: bold;
        }

        .logout-btn {
            background: none;
            border: none;
            color: var(--texto-secundario);
            cursor: pointer;
            font-size: 18px;
            padding: 5px;
        }

        .logout-btn:hover {
            color: #ef4444;
        }

        /* --- CATÁLOGO DE PRODUCTOS --- */
        .main-container {
            max-width: 1200px;
            margin: 50px auto 0 auto;
            padding: 0 20px;
        }

        .section-title {
            font-size: 26px;
            margin-bottom: 35px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 30px;
        }

        .product-card {
            background-color: var(--bg-card);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            border: 1px solid var(--borde);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            cursor: pointer;
        }

        .product-img-box {
            background-color: var(--bg-input);
            height: 240px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
            position: relative;
        }

        .product-img-box img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .product-card:hover .product-img-box img {
            transform: scale(1.1) rotate(-4deg);
        }

        .product-info {
            padding: 20px;
        }

        .product-category {
            font-size: 11px;
            color: var(--texto-secundario);
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .product-title {
            font-size: 17px;
            font-weight: 600;
            color: var(--texto-principal);
            margin-bottom: 12px;
        }

        .product-price-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .price {
            font-size: 19px;
            font-weight: 700;
            color: var(--texto-principal);
        }

        .add-to-cart-btn {
            background-color: var(--color-accento);
            color: white;
            border: none;
            width: 38px;
            height: 38px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.2s, transform 0.1s;
            z-index: 2; /* Para evitar activar el modal al pulsar el botón */
        }

        .add-to-cart-btn:hover {
            background-color: var(--color-accento-hover);
            transform: translateY(-2px);
        }

        /* --- SIDEBAR DEL CARRITO INTUITIVO --- */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 380px;
            height: 100%;
            background-color: var(--bg-carrito);
            backdrop-filter: blur(10px);
            box-shadow: -10px 0 30px rgba(0,0,0,0.15);
            z-index: 1000;
            transition: right 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            border-left: 1px solid var(--borde);
        }

        .cart-sidebar.active {
            right: 0;
        }

        .cart-header {
            padding: 24px;
            border-bottom: 1px solid var(--borde);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-header h3 {
            font-size: 18px;
            font-weight: 700;
        }

        .close-cart-btn {
            background: none;
            border: none;
            color: var(--texto-principal);
            font-size: 20px;
            cursor: pointer;
        }

        .cart-items-container {
            flex: 1;
            overflow-y: auto;
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .cart-item {
            display: flex;
            gap: 15px;
            align-items: center;
            background: var(--bg-card);
            padding: 10px;
            border-radius: 12px;
            border: 1px solid var(--borde);
        }

        .cart-item img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            background: var(--bg-input);
            border-radius: 8px;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .cart-item-variant {
            font-size: 11px;
            color: var(--texto-secundario);
            margin-bottom: 4px;
        }

        .cart-item-price {
            font-size: 14px;
            font-weight: 700;
            color: var(--color-accento);
        }

        .cart-item-qty {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 5px;
        }

        .qty-btn {
            background: var(--bg-input);
            border: none;
            color: var(--texto-principal);
            width: 22px;
            height: 22px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .cart-footer {
            padding: 24px;
            border-top: 1px solid var(--borde);
            background: var(--bg-card);
        }

        .cart-total-row {
            display: flex;
            justify-content: space-between;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .checkout-btn {
            width: 100%;
            background-color: #25d366;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            font-size: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .checkout-btn:hover {
            background-color: #20ba5a;
        }

        .empty-message {
            text-align: center;
            color: var(--texto-secundario);
            margin-top: 40px;
            font-size: 14px;
        }

        /* --- MODAL DETALLE DE PRODUCTO (VISTA HERMOSA) --- */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--overlay);
            backdrop-filter: blur(5px);
            z-index: 1001;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-wrapper {
            background-color: var(--bg-card);
            width: 90%;
            max-width: 780px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow);
            border: 1px solid var(--borde);
            position: relative;
            display: grid;
            grid-template-columns: 1fr 1fr;
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }

        @media (max-width: 700px) {
            .modal-wrapper {
                grid-template-columns: 1fr;
                max-height: 90vh;
                overflow-y: auto;
            }
        }

        .modal-overlay.active .modal-wrapper {
            transform: scale(1);
        }

        .modal-close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--bg-card);
            border: 1px solid var(--borde);
            color: var(--texto-principal);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .modal-left {
            background-color: var(--bg-input);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .modal-left img {
            max-width: 100%;
            max-height: 280px;
            object-fit: contain;
        }

        .modal-right {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .modal-cat {
            font-size: 11px;
            text-transform: uppercase;
            color: var(--color-accento);
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .modal-title {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .modal-price {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .modal-desc {
            font-size: 14px;
            color: var(--texto-secundario);
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* selectores de opciones */
        .option-group {
            margin-bottom: 15px;
        }

        .option-label {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--texto-secundario);
            margin-bottom: 8px;
            display: block;
        }

        .size-selector, .color-selector {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .size-btn {
            border: 1px solid var(--borde);
            background: none;
            color: var(--texto-principal);
            padding: 6px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
        }

        .size-btn.active {
            background-color: var(--color-accento);
            color: white;
            border-color: var(--color-accento);
        }

        .color-dot {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .color-dot.active {
            border-color: var(--color-accento);
            transform: scale(1.1);
        }

        .modal-buy-btn {
            width: 100%;
            background-color: var(--texto-principal);
            color: var(--bg-card);
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .modal-buy-btn:hover {
            background-color: var(--color-accento);
            color: white;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="#" class="logo">SaraZapatos</a>
        
        <div class="nav-right">
            <h1 class="welcome-title">Bienvenido {{ session('usuario_nombre', 'Invitado') }}</h1>

            <button class="theme-toggle-btn" id="themeToggle" onclick="toggleTheme()" title="Cambiar Tema">
                <i class="fa-solid fa-moon" id="themeIcon"></i>
            </button>

            <div class="cart-icon" onclick="toggleCart(true)">
                <i class="fa-solid fa-shopping-bag"></i>
                <span class="cart-count" id="cartCount">0</span>
            </div>

            <a href="{{ route('logout') }}" class="logout-btn" title="Cerrar Sesión" style="text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-weight: 600; font-size: 14px;">
    <i class="fa-solid fa-right-from-bracket"></i>
    <span>Cerrar Sesión</span>
</a>
        </div>
    </nav>

    <main class="main-container">
        <h2 class="section-title">Coleccion</h2>

        <div class="products-grid" id="productsGrid">
            </div>
    </main>

    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header">
            <h3>Tu Carrito</h3>
            <button class="close-cart-btn" onclick="toggleCart(false)"><i class="fa-solid fa-xmark"></i></button>
        </div>
        
        <div class="cart-items-container" id="cartItems">
            <p class="empty-message">Tu carrito está vacío.</p>
        </div>

        <div class="cart-footer">
            <div class="cart-total-row">
                <span>Total:</span>
                <span id="cartTotal">$0.00</span>
            </div>
            <button class="checkout-btn" onclick="procesarPago()">
                <i class="fa-brands fa-whatsapp"></i> Enviar Pedido por WhatsApp
            </button>
        </div>
    </div>

    <div class="modal-overlay" id="productModal" onclick="cerrarModalExterno(event)">
        <div class="modal-wrapper">
            <button class="modal-close-btn" onclick="toggleModal(false)"><i class="fa-solid fa-xmark"></i></button>
            
            <div class="modal-left">
                <img id="modalImg" src="" alt="">
            </div>
            
            <div class="modal-right">
                <span class="modal-cat" id="modalCat">Categoría</span>
                <h3 class="modal-title" id="modalTitle">Nombre del Producto</h3>
                <div class="modal-price" id="modalPrice">$0.00</div>
                <p class="modal-desc" id="modalDesc">Descripción atractiva aquí...</p>
                
                <div class="option-group">
                    <span class="option-label">Selecciona tu Talla:</span>
                    <div class="size-selector">
                        <button class="size-btn active" onclick="selectSize(this)">38</button>
                        <button class="size-btn" onclick="selectSize(this)">39</button>
                        <button class="size-btn" onclick="selectSize(this)">40</button>
                        <button class="size-btn" onclick="selectSize(this)">41</button>
                        <button class="size-btn" onclick="selectSize(this)">42</button>
                        <button class="size-btn" onclick="selectSize(this)">43</button>
                    </div>
                </div>

                <div class="option-group">
                    <span class="option-label">Color Disponible:</span>
                    <div class="color-selector">
                        <div class="color-dot active" style="background-color: #000;" onclick="selectColor(this, 'Negro')"></div>
                        <div class="color-dot" style="background-color: #fff; border: 1px solid #ccc;" onclick="selectColor(this, 'Blanco')"></div>
                        <div class="color-dot" style="background-color: #ef4444;" onclick="selectColor(this, 'Rojo')"></div>
                    </div>
                </div>

                <button class="modal-buy-btn" id="modalAddBtn">
                    <i class="fa-solid fa-cart-plus"></i> Añadir al Carrito
                </button>
            </div>
        </div>
    </div>

    <script>
        // --- BASE DE DATOS DE 12 PRODUCTOS ---
        const productos = [
            { id: 1, name: "Nike Air Max Scarlet", price: 120.00, cat: "Running", desc: "Zapatillas de alto rendimiento con amortiguación Air Max Maxima. Ideales para corredores urbanos que buscan confort y estilo agresivo.", img: "backend/assets/Imagenes/1.jpeg" },
            { id: 2, name: "Nike Zoom Neon V2", price: 95.00, cat: "Training", desc: "Diseño ultraligero con suela reactiva de espuma Zoom. Rompe tus marcas en el gimnasio con la máxima ventilación.", img: "backend/assets/Imagenes/12.jpeg" },
            { id: 3, name: "Air Force Pastel Edition", price: 110.00, cat: "Urbano", desc: "Un giro moderno al clásico de clásicos. Tonos pastel premium que combinan a la perfección con cualquier outfit casual diario.", img: "backend/assets/Imagenes/2.jpeg" },
            { id: 4, name: "Vans Old Skool Classic", price: 65.00, cat: "Skate / Retro", desc: "La legendaria zapatilla de skate con la icónica banda lateral. Construcción duradera de lona y gamuza con suela de wofle.", img: "backend/assets/Imagenes/3.jpeg" },
            { id: 5, name: "Adidas Forum Triple White", price: 130.00, cat: "Urbano", desc: "Inspiradas en el baloncesto de los 80s. Materiales de cuero premium con correa ajustable en el tobillo para un ajuste icónico.", img: "backend/assets/Imagenes/4.jpeg" },
            { id: 6, name: "Classic Timber All-Road", price: 180.00, cat: "Botas", desc: "Botas resistentes al agua fabricadas con cuero nobuk de primera calidad. Perfectas para la aventura o el estilo urbano rudo.", img: "backend/assets/Imagenes/5.jpeg" },
            { id: 7, name: "Puma Cali Dreamer", price: 85.00, cat: "Casual", desc: "Estilo californiano con una suela de plataforma gruesa. Comodidad absoluta para caminar todo el día llamando la atención.", img: "backend/assets/Imagenes/6.jpeg" },
            { id: 8, name: "New Balance 990 Slate", price: 145.00, cat: "Retro Running", desc: "La mezcla perfecta de amortiguación y estabilidad superior. Hechas para los amantes del diseño retro-running de alta gama.", img: "backend/assets/Imagenes/7.jpeg" },
            { id: 9, name: "Jordan Retro High Mocha", price: 210.00, cat: "Colección", desc: "Un esquema de color icónico y codiciado a nivel mundial. Cuero pulido de la más alta calidad y silueta legendaria.", img: "backend/assets/Imagenes/8.jpeg" },
            { id: 10, name: "Reebok Club C Vintage", price: 75.00, cat: "Retro", desc: "Diseño minimalista sacado de las canchas de tenis tradicionales. Piel suave y confort clásico que nunca pasa de moda.", img: "backend/assets/Imagenes/9.jpeg" },
            { id: 11, name: "Converse Chuck Taylor All Star", price: 60.00, cat: "Urbano", desc: "Las lonas más famosas del planeta. Silueta inconfundible, parches icónicos en el tobillo y versatilidad cultural eterna.", img: "backend/assets/Imagenes/10.jpeg" },
            { id: 12, name: "Asics Gel-Kayano Alpha", price: 160.00, cat: "Performance", desc: "Tecnología GEL de vanguardia para una absorción de impactos inigualable. Diseñadas científicamente para largas distancias.", img: "backend/assets/Imagenes/11.jpeg" }
        ];

        // --- RENDERIZAR CUADRÍCULA DE PRODUCTOS ---
        const grid = document.getElementById('productsGrid');
        productos.forEach(p => {
            grid.innerHTML += `
                <div class="product-card" onclick="abrirDetalle(${p.id})">
                    <div class="product-img-box">
                        <img src="${p.img}" alt="${p.name}">
                    </div>
                    <div class="product-info">
                        <div class="product-category">${p.cat}</div>
                        <h3 class="product-title">${p.name}</h3>
                        <div class="product-price-row">
                            <span class="price">$${p.price.toFixed(2)}</span>
                            <button class="add-to-cart-btn" onclick="event.stopPropagation(); agregarDirecto(${p.id})">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
        });

        // --- VARIABLES DE SELECCIÓN DE MODAL ---
        let tallaSeleccionada = "38";
        let colorSeleccionado = "Negro";
        let productoActualId = null;

        // --- LÓGICA MODO OSCURO ---
        function toggleTheme() {
            const body = document.documentElement;
            const currentTheme = body.getAttribute('data-theme');
            const icon = document.getElementById('themeIcon');
            if (currentTheme === 'dark') {
                body.removeAttribute('data-theme');
                icon.className = "fa-solid fa-moon";
                localStorage.setItem('theme', 'light');
            } else {
                body.setAttribute('data-theme', 'dark');
                icon.className = "fa-solid fa-sun";
                localStorage.setItem('theme', 'dark');
            }
        }
        if(localStorage.getItem('theme') === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
            document.getElementById('themeIcon').className = "fa-solid fa-sun";
        }

        // --- LÓGICA DEL CARRITO ---
        let carrito = [];

        function toggleCart(abrir) {
            document.getElementById('cartSidebar').classList.toggle('active', abrir);
        }

        function agregarDirecto(id) {
            const p = productos.find(item => item.id === id);
            agregarAlCarritoEstructura(p, "38", "Estándar");
        }

        function agregarDesdeModal() {
            const p = productos.find(item => item.id === productoActualId);
            agregarAlCarritoEstructura(p, tallaSeleccionada, colorSeleccionado);
            toggleModal(false);
        }

        function agregarAlCarritoEstructura(p, talla, color) {
            const itemKey = `${p.id}-${talla}-${color}`;
            const existente = carrito.find(item => item.key === itemKey);

            if(existente) {
                existente.cantidad++;
            } else {
                carrito.push({
                    key: itemKey, id: p.id, name: p.name, price: p.price, img: p.img, talla, color, cantidad: 1
                });
            }
            actualizarInterfazCarrito();
            toggleCart(true);
        }

        function cambiarCantidad(key, cambio) {
            const item = carrito.find(item => item.key === key);
            if(item) {
                item.cantidad += cambio;
                if(item.cantidad <= 0) carrito = carrito.filter(i => i.key !== key);
            }
            actualizarInterfazCarrito();
        }

        function actualizarInterfazCarrito() {
            const container = document.getElementById('cartItems');
            const countBadge = document.getElementById('cartCount');
            const totalLabel = document.getElementById('cartTotal');
            container.innerHTML = '';
            
            if(carrito.length === 0) {
                container.innerHTML = '<p class="empty-message">Tu carrito está vacío.</p>';
                countBadge.innerText = '0';
                totalLabel.innerText = '$0.00';
                return;
            }

            let totalProd = 0, precioTotal = 0;
            carrito.forEach(item => {
                totalProd += item.cantidad;
                precioTotal += item.price * item.cantidad;
                container.innerHTML += `
                    <div class="cart-item">
                        <img src="${item.img}" alt="${item.name}">
                        <div class="cart-item-details">
                            <h4 class="cart-item-title">${item.name}</h4>
                            <div class="cart-item-variant">Talla: ${item.talla} | Col: ${item.color}</div>
                            <div class="cart-item-price">$${(item.price * item.cantidad).toFixed(2)}</div>
                            <div class="cart-item-qty">
                                <button class="qty-btn" onclick="cambiarCantidad('${item.key}', -1)">-</button>
                                <span>${item.cantidad}</span>
                                <button class="qty-btn" onclick="cambiarCantidad('${item.key}', 1)">+</button>
                            </div>
                        </div>
                    </div>
                `;
            });
            countBadge.innerText = totalProd;
            totalLabel.innerText = `$${precioTotal.toFixed(2)}`;
        }

        // --- LÓGICA DEL MODAL DE DETALLE ---
        function toggleModal(abrir) {
            document.getElementById('productModal').classList.toggle('active', abrir);
        }

        function abrirDetalle(id) {
            const p = productos.find(item => item.id === id);
            productoActualId = p.id;
            
            document.getElementById('modalImg').src = p.img;
            document.getElementById('modalCat').innerText = p.cat;
            document.getElementById('modalTitle').innerText = p.name;
            document.getElementById('modalPrice').innerText = `$${p.price.toFixed(2)}`;
            document.getElementById('modalDesc').innerText = p.desc;

            // Resetear selectores visuales por defecto
            tallaSeleccionada = "38";
            colorSeleccionado = "Negro";
            document.querySelectorAll('.size-btn').forEach((btn, i) => btn.classList.toggle('active', i === 0));
            document.querySelectorAll('.color-dot').forEach((dot, i) => dot.classList.toggle('active', i === 0));
            
            document.getElementById('modalAddBtn').onclick = agregarDesdeModal;
            toggleModal(true);
        }

        function selectSize(btn) {
            document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            tallaSeleccionada = btn.innerText;
        }

        function selectColor(dot, nombreColor) {
            document.querySelectorAll('.color-dot').forEach(d => d.classList.remove('active'));
            dot.classList.add('active');
            colorSeleccionado = nombreColor;
        }

        function cerrarModalExterno(e) {
            if(e.target.id === 'productModal') toggleModal(false);
        }

        // --- ENVÍO AUTOMATIZADO A WHATSAPP ---
        function procesarPago() {
            if(carrito.length === 0) {
                alert("Tu carrito está vacío.");
                return;
            }

            const telefonoTuTienda = '50589455281'; 
            const nombreUsuario = document.querySelector('.welcome-title').innerText.replace('Bienvenido ', '').trim();

            let mensaje = `Hola, mi nombre es *${nombreUsuario}* y me gustaría realizar el siguiente pedido en ShoesZone:\n\n`;
            mensaje += `🛍️ *DETALLE DE TU ORDEN:*\n`;
            mensaje += `-------------------------------------------\n`;

            let precioTotal = 0;
            carrito.forEach(item => {
                const subtotalItem = item.price * item.cantidad;
                precioTotal += subtotalItem;
                mensaje += `• *${item.name}* (Talla: ${item.talla}, Col: ${item.color}) x${item.cantidad} - $${subtotalItem.toFixed(2)}\n`;
            });

            mensaje += `-------------------------------------------\n`;
            mensaje += `💰 *TOTAL A PAGAR:* $${precioTotal.toFixed(2)}\n\n`;
            mensaje += `¿Me podrían indicar los métodos de pago y el proceso de envío? ¡Muchas gracias! ✨`;

            const mensajeCodificado = encodeURIComponent(mensaje);
            const enlaceWhatsApp = `https://wa.me/${telefonoTuTienda}?text=${mensajeCodificado}`;

            alert("¡Pedido generado con éxito! Te estamos redirigiendo a WhatsApp para finalizar la compra.");
            carrito = [];
            actualizarInterfazCarrito();
            toggleCart(false);
            window.open(enlaceWhatsApp, '_blank');
        }
    </script>
</body>
</html>