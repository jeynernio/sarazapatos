<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SaraZapatos — Tienda</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;}
:root{
  --black:#0a0a0a;
  --gray-900:#111827;
  --gray-700:#374151;
  --gray-400:#9ca3af;
  --gray-100:#f3f4f6;
  --gray-50:#f9fafb;
  --blue:#2563eb;
  --blue-dark:#1d4ed8;
  --white:#ffffff;
  --red:#ef4444;
  --green:#16a34a;
}
html{scroll-behavior:smooth;}
body{font-family:'Inter',sans-serif;background:var(--gray-50);color:var(--black);overflow-x:hidden;}

/* ── SCROLLBAR ── */
::-webkit-scrollbar{width:6px;}
::-webkit-scrollbar-track{background:var(--gray-100);}
::-webkit-scrollbar-thumb{background:var(--gray-400);border-radius:3px;}

/* ── OVERLAY ── */
#overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:800;backdrop-filter:blur(2px);}
#overlay.active{display:block;}

/* ══════════════ HEADER ══════════════ */
header{
  position:sticky;top:0;z-index:700;
  background:var(--black);
  padding:0 40px;
  height:65px;
  display:flex;align-items:center;justify-content:space-between;
  border-bottom:1px solid #1f2937;
}
.logo{
  font-size:22px;font-weight:900;color:var(--white);
  letter-spacing:-0.5px;display:flex;align-items:center;gap:8px;
}
.logo span{color:var(--blue);}
nav{display:flex;align-items:center;gap:4px;}
nav a{
  color:#9ca3af;text-decoration:none;font-size:13px;font-weight:500;
  padding:6px 14px;border-radius:8px;transition:.2s;cursor:pointer;
}
nav a:hover,nav a.active{color:var(--white);background:#1f2937;}
.header-right{display:flex;align-items:center;gap:12px;}
.user-pill{
  display:flex;align-items:center;gap:8px;
  background:#1f2937;border-radius:50px;padding:5px 14px 5px 6px;
  color:var(--white);font-size:13px;font-weight:500;cursor:pointer;
  position:relative;
}
.avatar{
  width:32px;height:32px;border-radius:50%;background:var(--blue);
  display:flex;align-items:center;justify-content:center;
  font-weight:700;font-size:13px;color:var(--white);
}
.user-dropdown{
  display:none;position:absolute;top:calc(100% + 8px);right:0;
  background:var(--white);border-radius:12px;min-width:180px;
  box-shadow:0 10px 40px rgba(0,0,0,.15);overflow:hidden;z-index:900;
}
.user-dropdown.open{display:block;}
.user-dropdown a{
  display:flex;align-items:center;gap:10px;padding:12px 16px;
  font-size:13px;color:var(--gray-700);text-decoration:none;transition:.15s;
}
.user-dropdown a:hover{background:var(--gray-50);}
.user-dropdown hr{border:none;border-top:1px solid var(--gray-100);}
.user-dropdown .logout{color:var(--red);}
.cart-btn{
  position:relative;background:var(--blue);border:none;color:var(--white);
  width:42px;height:42px;border-radius:10px;cursor:pointer;
  font-size:18px;display:flex;align-items:center;justify-content:center;
  transition:.2s;
}
.cart-btn:hover{background:var(--blue-dark);}
.cart-badge{
  position:absolute;top:-6px;right:-6px;background:var(--red);color:var(--white);
  width:18px;height:18px;border-radius:50%;font-size:10px;font-weight:700;
  display:flex;align-items:center;justify-content:center;
  display:none;
}

/* ══════════════ HERO ══════════════ */
.hero{
  background:var(--black);
  padding:80px 40px;
  display:flex;align-items:center;justify-content:space-between;
  gap:40px;overflow:hidden;position:relative;
}
.hero::before{
  content:'';position:absolute;inset:0;
  background:radial-gradient(ellipse at 70% 50%, #1e3a8a22 0%, transparent 65%);
}
.hero-text{position:relative;max-width:560px;}
.hero-eyebrow{
  display:inline-flex;align-items:center;gap:6px;
  background:#1f2937;color:#60a5fa;padding:5px 12px;border-radius:50px;
  font-size:12px;font-weight:600;letter-spacing:.5px;text-transform:uppercase;
  margin-bottom:20px;
}
.hero h1{
  font-size:clamp(36px,5vw,64px);font-weight:900;color:var(--white);
  line-height:1.05;letter-spacing:-2px;margin-bottom:20px;
}
.hero h1 span{color:var(--blue);}
.hero p{color:#9ca3af;font-size:16px;line-height:1.7;margin-bottom:30px;}
.hero-cta{display:flex;gap:12px;flex-wrap:wrap;}
.btn-primary{
  background:var(--blue);color:var(--white);border:none;
  padding:14px 28px;border-radius:12px;font-size:14px;font-weight:600;
  cursor:pointer;transition:.2s;display:inline-flex;align-items:center;gap:8px;
}
.btn-primary:hover{background:var(--blue-dark);transform:translateY(-1px);}
.btn-ghost{
  background:transparent;color:var(--white);
  border:1px solid #374151;
  padding:14px 28px;border-radius:12px;font-size:14px;font-weight:600;
  cursor:pointer;transition:.2s;
}
.btn-ghost:hover{border-color:#6b7280;background:#1f2937;}
.hero-stats{
  display:flex;gap:32px;margin-top:40px;padding-top:32px;
  border-top:1px solid #1f2937;
}
.stat-item{color:var(--white);}
.stat-num{font-size:28px;font-weight:900;letter-spacing:-1px;}
.stat-num span{color:var(--blue);}
.stat-label{font-size:12px;color:#6b7280;margin-top:2px;}
.hero-visual{
  position:relative;flex-shrink:0;display:flex;align-items:center;
}
.hero-img{
  width:420px;max-width:45vw;height:320px;
  border-radius:20px;overflow:hidden;position:relative;
}
.hero-img img{width:100%;height:100%;object-fit:cover;filter:brightness(.85);}

/* ══════════════ FILTER BAR ══════════════ */
.filter-bar{
  background:var(--white);padding:20px 40px;
  display:flex;align-items:center;gap:12px;flex-wrap:wrap;
  border-bottom:1px solid var(--gray-100);position:sticky;top:65px;z-index:600;
}
.filter-label{font-size:12px;font-weight:600;color:var(--gray-400);text-transform:uppercase;letter-spacing:.5px;margin-right:4px;}
.filter-btn{
  border:1.5px solid var(--gray-100);background:var(--white);
  padding:8px 18px;border-radius:50px;font-size:13px;font-weight:500;
  cursor:pointer;transition:.2s;color:var(--gray-700);font-family:inherit;
}
.filter-btn:hover{border-color:var(--blue);color:var(--blue);}
.filter-btn.active{background:var(--blue);border-color:var(--blue);color:var(--white);}
.filter-right{margin-left:auto;display:flex;align-items:center;gap:10px;}
.sort-select{
  border:1.5px solid var(--gray-100);background:var(--white);
  padding:8px 14px;border-radius:10px;font-size:13px;font-weight:500;
  cursor:pointer;color:var(--gray-700);font-family:inherit;outline:none;
}

/* ══════════════ PRODUCTS ══════════════ */
.shop-layout{display:flex;min-height:70vh;}

/* sidebar cats */
.sidebar{
  width:220px;flex-shrink:0;padding:30px 24px;
  border-right:1px solid var(--gray-100);background:var(--white);
  position:sticky;top:116px;align-self:flex-start;height:fit-content;
}
.sidebar h3{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--gray-400);margin-bottom:14px;}
.sidebar-item{
  display:flex;align-items:center;justify-content:space-between;
  padding:9px 12px;border-radius:10px;cursor:pointer;margin-bottom:2px;
  font-size:13px;font-weight:500;color:var(--gray-700);transition:.15s;
}
.sidebar-item:hover{background:var(--gray-50);color:var(--black);}
.sidebar-item.active{background:#eff6ff;color:var(--blue);}
.sidebar-count{
  background:var(--gray-100);color:var(--gray-400);
  font-size:11px;font-weight:600;padding:2px 7px;border-radius:20px;
}
.sidebar-item.active .sidebar-count{background:#dbeafe;color:var(--blue);}
.sidebar-divider{border:none;border-top:1px solid var(--gray-100);margin:16px 0;}

/* main products area */
.products-main{flex:1;padding:30px 35px;}
.section-header{
  display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;
}
.section-header h2{font-size:20px;font-weight:700;letter-spacing:-.5px;}
.section-header p{font-size:13px;color:var(--gray-400);margin-top:2px;}
.result-count{font-size:13px;color:var(--gray-400);}

/* product grid */
.product-grid{
  display:grid;
  grid-template-columns:repeat(auto-fill,minmax(230px,1fr));
  gap:20px;
}
.product-card{
  background:var(--white);border-radius:16px;overflow:hidden;
  border:1px solid var(--gray-100);cursor:pointer;
  transition:.25s;position:relative;
}
.product-card:hover{box-shadow:0 12px 40px rgba(0,0,0,.1);transform:translateY(-3px);}
.product-img{
  position:relative;height:210px;overflow:hidden;background:var(--gray-50);
}
.product-img img{width:100%;height:100%;object-fit:cover;transition:.4s;}
.product-card:hover .product-img img{transform:scale(1.06);}
.badge{
  position:absolute;top:12px;left:12px;
  background:var(--black);color:var(--white);
  font-size:10px;font-weight:700;padding:4px 9px;border-radius:6px;
  text-transform:uppercase;letter-spacing:.5px;
}
.badge.sale{background:var(--red);}
.badge.new{background:var(--green);}
.wish-btn{
  position:absolute;top:10px;right:10px;
  background:rgba(255,255,255,.9);border:none;width:32px;height:32px;
  border-radius:50%;cursor:pointer;font-size:15px;display:flex;align-items:center;justify-content:center;
  opacity:0;transition:.2s;backdrop-filter:blur(4px);
}
.product-card:hover .wish-btn{opacity:1;}
.wish-btn.loved{opacity:1;color:var(--red);}
.product-body{padding:16px;}
.brand-tag{font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--blue);margin-bottom:4px;}
.product-name{font-size:14px;font-weight:600;margin-bottom:8px;color:var(--black);line-height:1.3;}
.product-footer{display:flex;align-items:center;justify-content:space-between;margin-top:12px;}
.price{font-size:18px;font-weight:900;color:var(--black);letter-spacing:-.5px;}
.price-old{font-size:12px;color:var(--gray-400);text-decoration:line-through;margin-top:1px;}
.add-btn{
  background:var(--black);color:var(--white);border:none;
  width:34px;height:34px;border-radius:8px;cursor:pointer;
  font-size:16px;display:flex;align-items:center;justify-content:center;
  transition:.2s;flex-shrink:0;
}
.add-btn:hover{background:var(--blue);}

/* ══════════════ PRODUCT MODAL ══════════════ */
.product-modal{
  display:none;position:fixed;inset:0;z-index:1000;
  justify-content:center;align-items:center;padding:20px;
  background:rgba(0,0,0,.6);backdrop-filter:blur(4px);
}
.product-modal.open{display:flex;}
.pm-content{
  background:var(--white);border-radius:24px;
  width:100%;max-width:760px;max-height:90vh;overflow-y:auto;
  display:flex;gap:0;position:relative;
}
.pm-close{
  position:absolute;top:16px;right:16px;background:var(--gray-100);border:none;
  width:36px;height:36px;border-radius:50%;cursor:pointer;font-size:18px;
  display:flex;align-items:center;justify-content:center;z-index:10;transition:.15s;
}
.pm-close:hover{background:var(--gray-900);color:var(--white);}
.pm-left{flex:1;min-height:400px;}
.pm-left img{width:100%;height:100%;object-fit:cover;border-radius:24px 0 0 24px;}
.pm-right{flex:1;padding:36px;display:flex;flex-direction:column;}
.pm-brand{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:var(--blue);margin-bottom:8px;}
.pm-name{font-size:26px;font-weight:900;letter-spacing:-1px;line-height:1.1;margin-bottom:12px;}
.pm-price{font-size:32px;font-weight:900;color:var(--black);letter-spacing:-1px;margin-bottom:20px;}
.pm-desc{font-size:14px;color:var(--gray-700);line-height:1.7;margin-bottom:24px;}
.pm-label{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--gray-400);margin-bottom:10px;}
.sizes{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:20px;}
.size-btn{
  border:1.5px solid var(--gray-100);background:var(--white);
  padding:8px 14px;border-radius:8px;font-size:13px;font-weight:600;
  cursor:pointer;transition:.15s;font-family:inherit;
}
.size-btn:hover{border-color:var(--black);}
.size-btn.selected{background:var(--black);color:var(--white);border-color:var(--black);}
.colors{display:flex;gap:10px;margin-bottom:28px;}
.color-dot{
  width:28px;height:28px;border-radius:50%;cursor:pointer;
  border:3px solid transparent;transition:.15s;
}
.color-dot.selected{border-color:var(--black);box-shadow:0 0 0 2px var(--white) inset;}
.pm-actions{display:flex;gap:10px;margin-top:auto;}
.pm-add{flex:1;background:var(--black);color:var(--white);border:none;padding:15px;border-radius:12px;font-size:14px;font-weight:700;cursor:pointer;transition:.2s;font-family:inherit;}
.pm-add:hover{background:var(--blue);}
.pm-wish{background:var(--gray-100);border:none;padding:15px 16px;border-radius:12px;cursor:pointer;font-size:18px;transition:.2s;}
.pm-wish:hover{background:var(--gray-900);color:var(--white);}

/* ══════════════ CART SIDEBAR ══════════════ */
.cart-sidebar{
  position:fixed;top:0;right:-420px;width:400px;height:100vh;
  background:var(--white);z-index:900;
  box-shadow:-20px 0 60px rgba(0,0,0,.15);
  transition:right .35s cubic-bezier(.4,0,.2,1);
  display:flex;flex-direction:column;
}
.cart-sidebar.open{right:0;}
.cart-header{
  padding:24px;border-bottom:1px solid var(--gray-100);
  display:flex;align-items:center;justify-content:space-between;
}
.cart-header h2{font-size:18px;font-weight:700;}
.cart-close{
  background:var(--gray-100);border:none;width:36px;height:36px;
  border-radius:50%;cursor:pointer;font-size:18px;display:flex;align-items:center;justify-content:center;
  transition:.15s;
}
.cart-close:hover{background:var(--gray-900);color:var(--white);}
.cart-items{flex:1;overflow-y:auto;padding:20px 24px;}
.cart-empty{
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  height:60%;color:var(--gray-400);gap:12px;
}
.cart-empty .empty-icon{font-size:52px;}
.cart-empty p{font-size:14px;}
.cart-item{
  display:flex;align-items:center;gap:14px;padding:14px 0;
  border-bottom:1px solid var(--gray-100);
}
.ci-img{width:64px;height:64px;border-radius:10px;overflow:hidden;flex-shrink:0;background:var(--gray-100);}
.ci-img img{width:100%;height:100%;object-fit:cover;}
.ci-info{flex:1;}
.ci-name{font-size:13px;font-weight:600;line-height:1.3;margin-bottom:3px;}
.ci-meta{font-size:11px;color:var(--gray-400);}
.ci-price{font-size:14px;font-weight:700;margin-top:4px;}
.ci-qty{display:flex;align-items:center;gap:8px;margin-top:8px;}
.qty-btn{
  background:var(--gray-100);border:none;width:24px;height:24px;
  border-radius:6px;cursor:pointer;font-size:14px;font-weight:700;
  display:flex;align-items:center;justify-content:center;transition:.15s;
}
.qty-btn:hover{background:var(--gray-900);color:var(--white);}
.qty-num{font-size:13px;font-weight:600;min-width:20px;text-align:center;}
.ci-del{
  background:none;border:none;cursor:pointer;color:var(--gray-400);
  font-size:16px;padding:4px;transition:.15s;
}
.ci-del:hover{color:var(--red);}
.cart-footer{padding:20px 24px;border-top:1px solid var(--gray-100);}
.cart-summary{margin-bottom:16px;}
.summary-row{display:flex;justify-content:space-between;font-size:13px;color:var(--gray-700);margin-bottom:6px;}
.summary-row.total{font-size:17px;font-weight:700;color:var(--black);margin-top:10px;padding-top:10px;border-top:1px solid var(--gray-100);}
.checkout-btn{
  width:100%;background:var(--black);color:var(--white);border:none;
  padding:15px;border-radius:12px;font-size:14px;font-weight:700;
  cursor:pointer;transition:.2s;font-family:inherit;display:flex;align-items:center;justify-content:center;gap:8px;
  margin-bottom:10px;
}
.checkout-btn:hover{background:var(--blue);}
.wa-btn{
  width:100%;background:#25d366;color:var(--white);border:none;
  padding:13px;border-radius:12px;font-size:13px;font-weight:600;
  cursor:pointer;transition:.2s;font-family:inherit;display:flex;align-items:center;justify-content:center;gap:8px;
}
.wa-btn:hover{background:#1ebe5d;}

/* ══════════════ TOAST ══════════════ */
.toast{
  position:fixed;bottom:24px;left:50%;transform:translateX(-50%) translateY(80px);
  background:var(--black);color:var(--white);padding:12px 20px;border-radius:12px;
  font-size:13px;font-weight:500;z-index:2000;transition:.3s;
  white-space:nowrap;display:flex;align-items:center;gap:8px;
  box-shadow:0 8px 30px rgba(0,0,0,.3);
}
.toast.show{transform:translateX(-50%) translateY(0);}

/* ══════════════ FOOTER ══════════════ */
footer{
  background:var(--black);color:#6b7280;text-align:center;
  padding:30px;font-size:13px;border-top:1px solid #1f2937;
  margin-top:60px;
}

/* ══════════════ RESPONSIVE ══════════════ */
@media(max-width:900px){
  header{padding:0 20px;}
  .hero{padding:50px 20px;flex-direction:column;}
  .hero-img{width:100%;max-width:100%;height:200px;}
  .hero-img img{border-radius:16px;}
  .pm-left img{border-radius:24px 24px 0 0;}
  .sidebar{display:none;}
  .products-main{padding:20px;}
  .filter-bar{padding:15px 20px;}
  .pm-content{flex-direction:column;max-width:95vw;}
  .pm-left{min-height:240px;}
  .pm-left img{border-radius:24px 24px 0 0;}
  .cart-sidebar{width:95vw;right:-100vw;}
  .cart-sidebar.open{right:0;}
  .hero-stats{gap:20px;}
}
</style>
</head>
<body>

<div id="overlay" onclick="closeAll()"></div>

<!-- TOAST -->
<div class="toast" id="toast">✓ Agregado al carrito</div>

<!-- HEADER -->
<header>
  <div class="logo">👟 Sara<span>Zapatos</span></div>
  <nav>
    <a href="#" class="active" onclick="filterCat('all',this)">Todo</a>
    <a href="#" onclick="filterCat('nike',this)">Nike</a>
    <a href="#" onclick="filterCat('adidas',this)">Adidas</a>
    <a href="#" onclick="filterCat('converse',this)">Converse</a>
    <a href="#" onclick="filterCat('running',this)">Running</a>
  </nav>
  <div class="header-right">
    <button class="cart-btn" onclick="toggleCart()">
      🛒
      <span class="cart-badge" id="cartBadge">0</span>
    </button>
    <div class="user-pill" onclick="toggleUserMenu()">
      <div class="avatar">J</div>
      Jeyner Niño ▾
      <div class="user-dropdown" id="userDropdown">
        <a href="#">👤 Mi perfil</a>
        <a href="#">📦 Mis pedidos</a>
        <a href="#">❤️ Favoritos</a>
        <hr>
        <a href="#" class="logout">🚪 Cerrar sesión</a>
      </div>
    </div>
  </div>
</header>

<!-- HERO -->
<section class="hero">
  <div class="hero-text">
    <div class="hero-eyebrow">🔥 Nueva colección 2025</div>
    <h1>Hola,<br><span>{{ session('usuario_nombre') }}</span></h1>
    <p>Encuentra el par perfecto entre más de 50 modelos de las mejores marcas del mundo. Envíos a toda Nicaragua.</p>
    <div class="hero-cta">
      <button class="btn-primary" onclick="filterCat('all',null)">Ver todo ↓</button>
      <button class="btn-ghost" onclick="filterCat('nike',null)">Nike 2025</button>
    </div>
    <div class="hero-stats">
      <div class="stat-item"><div class="stat-num">50<span>+</span></div><div class="stat-label">Modelos</div></div>
      <div class="stat-item"><div class="stat-num">3<span>k</span></div><div class="stat-label">Clientes</div></div>
      <div class="stat-item"><div class="stat-num">4.9<span>★</span></div><div class="stat-label">Rating</div></div>
    </div>
  </div>
  <div class="hero-visual">
    <div class="hero-img">
      <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80" alt="hero shoe">
    </div>
  </div>
</section>

<!-- FILTER BAR -->
<div class="filter-bar">
  <span class="filter-label">Filtrar:</span>
  <button class="filter-btn active" onclick="filterCat('all',this)">Todos</button>
  <button class="filter-btn" onclick="filterCat('nike',this)">Nike</button>
  <button class="filter-btn" onclick="filterCat('adidas',this)">Adidas</button>
  <button class="filter-btn" onclick="filterCat('converse',this)">Converse</button>
  <button class="filter-btn" onclick="filterCat('running',this)">Running</button>
  <button class="filter-btn" onclick="filterCat('casual',this)">Casual</button>
  <div class="filter-right">
    <select class="sort-select" onchange="sortProducts(this.value)">
      <option value="default">Ordenar por</option>
      <option value="price-asc">Menor precio</option>
      <option value="price-desc">Mayor precio</option>
      <option value="name">Nombre A–Z</option>
    </select>
  </div>
</div>

<!-- SHOP LAYOUT -->
<div class="shop-layout">
  <!-- SIDEBAR -->
  <aside class="sidebar">
    <h3>Categorías</h3>
    <div class="sidebar-item active" onclick="filterCat('all',this,true)">
      Todos <span class="sidebar-count">10</span>
    </div>
    <div class="sidebar-item" onclick="filterCat('nike',this,true)">
      👟 Nike <span class="sidebar-count">3</span>
    </div>
    <div class="sidebar-item" onclick="filterCat('adidas',this,true)">
      🔥 Adidas <span class="sidebar-count">3</span>
    </div>
    <div class="sidebar-item" onclick="filterCat('converse',this,true)">
      ⭐ Converse <span class="sidebar-count">2</span>
    </div>
    <div class="sidebar-item" onclick="filterCat('running',this,true)">
      🏃 Running <span class="sidebar-count">1</span>
    </div>
    <div class="sidebar-item" onclick="filterCat('casual',this,true)">
      😎 Casual <span class="sidebar-count">1</span>
    </div>
    <hr class="sidebar-divider">
    <h3>Precio</h3>
    <div class="sidebar-item" onclick="filterPrice(0,3200)">Hasta C$ 3,200</div>
    <div class="sidebar-item" onclick="filterPrice(3200,3700)">C$ 3,200 – 3,700</div>
    <div class="sidebar-item" onclick="filterPrice(3700,9999)">Más de C$ 3,700</div>
  </aside>

  <!-- PRODUCTS MAIN -->
  <main class="products-main">
    <div class="section-header">
      <div>
        <h2 id="sectionTitle">Todos los productos</h2>
        <p id="sectionCount" style="font-size:13px;color:#9ca3af;margin-top:3px;"></p>
      </div>
    </div>
    <div class="product-grid" id="productGrid"></div>
  </main>
</div>

<!-- PRODUCT MODAL -->
<div class="product-modal" id="productModal">
  <div class="pm-content">
    <button class="pm-close" onclick="closeModal()">×</button>
    <div class="pm-left" id="pmImg"></div>
    <div class="pm-right">
      <div class="pm-brand" id="pmBrand"></div>
      <div class="pm-name" id="pmName"></div>
      <div class="pm-price" id="pmPrice"></div>
      <div class="pm-desc" id="pmDesc"></div>
      <div class="pm-label">Talla</div>
      <div class="sizes" id="pmSizes"></div>
      <div class="pm-label">Color</div>
      <div class="colors" id="pmColors"></div>
      <div class="pm-actions">
        <button class="pm-add" onclick="addFromModal()">Agregar al carrito</button>
        <button class="pm-wish" onclick="toggleWishModal()">♡</button>
      </div>
    </div>
  </div>
</div>

<!-- CART SIDEBAR -->
<div class="cart-sidebar" id="cartSidebar">
  <div class="cart-header">
    <h2>🛒 Mi carrito</h2>
    <button class="cart-close" onclick="toggleCart()">×</button>
  </div>
  <div class="cart-items" id="cartItems">
    <div class="cart-empty">
      <div class="empty-icon">🛒</div>
      <p>Tu carrito está vacío</p>
    </div>
  </div>
  <div class="cart-footer">
    <div class="cart-summary" id="cartSummary"></div>
    <button class="checkout-btn" onclick="checkout()">💳 Proceder al pago</button>
    <button class="wa-btn" onclick="buyWhatsapp()">💬 Comprar por WhatsApp</button>
  </div>
</div>

<footer>
  © 2025 SaraZapatos — Managua, Nicaragua · Hecho con ❤️
</footer>

<script>
// ═══════════════ DATA ═══════════════
const products = [
  {
    id:1, name:'Nike Air Max 270', brand:'Nike', cat:['nike','running'],
    price:4200, oldPrice:4800,
    img:'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&q=80',
    badge:'Sale', badgeType:'sale',
    desc:'La Nike Air Max 270 fue diseñada para el estilo de vida urbano. Con la unidad Air más grande hasta ahora en el talón, ofrece comodidad excepcional todo el día.',
    sizes:[36,37,38,39,40,41,42,43],
    colors:['#111827','#2563eb','#dc2626'],
  },
  {
    id:2, name:'Nike Revolution 6', brand:'Nike', cat:['nike','running'],
    price:3500,
    img:'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?w=600&q=80',
    badge:'Nuevo', badgeType:'new',
    desc:'Comodidad ligera y un look fresco para tu entrenamiento diario. Suela de espuma suave que se adapta a cada paso.',
    sizes:[37,38,39,40,41,42,43],
    colors:['#111827','#ffffff','#16a34a'],
  },
  {
    id:3, name:'Nike Pegasus 40', brand:'Nike', cat:['nike','running'],
    price:5100,
    img:'https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=600&q=80',
    desc:'El Nike Pegasus 40 celebra 40 años de running. Tecnología React Foam para mayor amortiguación y retorno de energía.',
    sizes:[38,39,40,41,42,43,44],
    colors:['#f97316','#111827'],
  },
  {
    id:4, name:'Adidas Samba OG', brand:'Adidas', cat:['adidas','casual'],
    price:3800,
    img:'https://images.unsplash.com/photo-1518002171953-a080ee817e1f?w=600&q=80',
    badge:'Tendencia', badgeType:'',
    desc:'Icónica desde los 70s. El Adidas Samba OG combina cuero premium con una suela de goma que nunca pasa de moda.',
    sizes:[36,37,38,39,40,41,42],
    colors:['#111827','#ffffff','#1d4ed8'],
  },
  {
    id:5, name:'Adidas Campus 00s', brand:'Adidas', cat:['adidas','casual'],
    price:3900,
    img:'https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?w=600&q=80',
    badge:'Nuevo', badgeType:'new',
    desc:'El estilo retro de los 2000s vuelve con el Campus 00s. Silueta redondeada, suela gruesa y gamuza suave en colores earth tone.',
    sizes:[36,37,38,39,40,41,42,43],
    colors:['#92400e','#374151','#111827'],
  },
  {
    id:6, name:'Adidas Ultraboost 23', brand:'Adidas', cat:['adidas','running'],
    price:6200, oldPrice:7000,
    img:'https://images.unsplash.com/photo-1460353581641-37baddab0fa2?w=600&q=80',
    badge:'Sale', badgeType:'sale',
    desc:'El Ultraboost 23 lleva la tecnología Boost al siguiente nivel. Energía de retorno máxima para corredores exigentes.',
    sizes:[38,39,40,41,42,43,44,45],
    colors:['#111827','#2563eb','#ffffff'],
  },
  {
    id:7, name:'Converse Chuck 70 Hi', brand:'Converse', cat:['converse','casual'],
    price:3200,
    img:'https://images.unsplash.com/photo-1515955656352-a1fa3ffcd111?w=600&q=80',
    desc:'El clásico que nunca muere. Chuck 70 con lona premium, forro de algodón y la suéla de goma icónica de Converse.',
    sizes:[36,37,38,39,40,41,42,43],
    colors:['#111827','#dc2626','#2563eb'],
  },
  {
    id:8, name:'Converse Run Star Motion', brand:'Converse', cat:['converse'],
    price:4100,
    img:'https://images.unsplash.com/photo-1494496195158-c3bc573a7c9e?w=600&q=80',
    badge:'Nuevo', badgeType:'new',
    desc:'El futuro del Converse. Run Star Motion combina la silueta clásica con una suela chunky de dos tonos para un look de vanguardia.',
    sizes:[37,38,39,40,41,42],
    colors:['#ffffff','#111827'],
  },
  {
    id:9, name:'Nike Air Force 1', brand:'Nike', cat:['nike','casual'],
    price:4500,
    img:'https://images.unsplash.com/photo-1600269452121-4f2416e55c28?w=600&q=80',
    desc:'Un ícono desde 1982. El Air Force 1 es el zapato de basketball más legendario del mundo, hoy un must-have de street style.',
    sizes:[36,37,38,39,40,41,42,43,44],
    colors:['#ffffff','#111827'],
  },
  {
    id:10, name:'Adidas Stan Smith', brand:'Adidas', cat:['adidas','casual'],
    price:3600,
    img:'https://images.unsplash.com/photo-1539185441755-769473a23570?w=600&q=80',
    desc:'El tenis más vendido de la historia. Stan Smith en cuero blanco con detalles verdes, atemporal y versátil para cualquier outfit.',
    sizes:[36,37,38,39,40,41,42,43],
    colors:['#ffffff','#16a34a'],
  },
];

// ═══════════════ STATE ═══════════════
let cart = [];
let wishlist = new Set();
let currentFilter = 'all';
let currentSort = 'default';
let currentProduct = null;
let selectedSize = null;
let selectedColor = null;

// ═══════════════ RENDER PRODUCTS ═══════════════
function getFiltered(){
  let list = products.filter(p => currentFilter === 'all' || p.cat.includes(currentFilter));
  if(currentSort === 'price-asc') list.sort((a,b)=>a.price-b.price);
  else if(currentSort === 'price-desc') list.sort((a,b)=>b.price-a.price);
  else if(currentSort === 'name') list.sort((a,b)=>a.name.localeCompare(b.name));
  return list;
}

function renderProducts(){
  const list = getFiltered();
  const grid = document.getElementById('productGrid');
  document.getElementById('sectionCount').textContent = list.length + ' producto' + (list.length!==1?'s':'');
  
  if(!list.length){
    grid.innerHTML = '<div style="grid-column:1/-1;text-align:center;padding:60px;color:#9ca3af;"><div style="font-size:48px;margin-bottom:12px">🔍</div><p>No hay productos en esta categoría</p></div>';
    return;
  }

  grid.innerHTML = list.map(p => `
    <div class="product-card" onclick="openProduct(${p.id})">
      <div class="product-img">
        <img src="${p.img}" alt="${p.name}" loading="lazy">
        ${p.badge ? `<div class="badge ${p.badgeType}">${p.badge}</div>` : ''}
        <button class="wish-btn ${wishlist.has(p.id)?'loved':''}" onclick="toggleWish(event,${p.id})">${wishlist.has(p.id)?'❤️':'🤍'}</button>
      </div>
      <div class="product-body">
        <div class="brand-tag">${p.brand}</div>
        <div class="product-name">${p.name}</div>
        <div class="product-footer">
          <div>
            <div class="price">C$ ${p.price.toLocaleString()}</div>
            ${p.oldPrice ? `<div class="price-old">C$ ${p.oldPrice.toLocaleString()}</div>` : ''}
          </div>
          <button class="add-btn" onclick="quickAdd(event,${p.id})">+</button>
        </div>
      </div>
    </div>
  `).join('');
}

// ═══════════════ FILTERS ═══════════════
function filterCat(cat, el, sidebar=false){
  currentFilter = cat;

  // Sync all nav links
  document.querySelectorAll('nav a').forEach(a=>a.classList.remove('active'));
  document.querySelectorAll('.filter-btn').forEach(b=>b.classList.remove('active'));
  document.querySelectorAll('.sidebar-item').forEach(s=>s.classList.remove('active'));

  if(el){
    if(sidebar) el.classList.add('active');
    else {
      // find matching filter-btn and nav a
      document.querySelectorAll('.filter-btn').forEach(b=>{
        if(b.textContent.toLowerCase().includes(cat) || (cat==='all' && b.textContent.includes('Todos'))) b.classList.add('active');
      });
      el.classList.add('active');
    }
  } else {
    if(cat==='all'){
      document.querySelector('.filter-btn').classList.add('active');
      document.querySelector('nav a').classList.add('active');
    }
  }

  const titles = {all:'Todos los productos',nike:'Nike',adidas:'Adidas',converse:'Converse',running:'Running',casual:'Casual'};
  document.getElementById('sectionTitle').textContent = titles[cat]||cat;
  
  document.querySelector('.products-main').scrollIntoView({behavior:'smooth',block:'start'});
  renderProducts();
}

function filterPrice(min,max){
  const list = products.filter(p=>p.price>=min && p.price<=max);
  const grid = document.getElementById('productGrid');
  document.getElementById('sectionTitle').textContent = `C$ ${min.toLocaleString()} – ${max===9999?'más':max.toLocaleString()}`;
  document.getElementById('sectionCount').textContent = list.length + ' productos';
  grid.innerHTML = list.map(p => `
    <div class="product-card" onclick="openProduct(${p.id})">
      <div class="product-img">
        <img src="${p.img}" alt="${p.name}" loading="lazy">
        ${p.badge ? `<div class="badge ${p.badgeType}">${p.badge}</div>` : ''}
        <button class="wish-btn ${wishlist.has(p.id)?'loved':''}" onclick="toggleWish(event,${p.id})">${wishlist.has(p.id)?'❤️':'🤍'}</button>
      </div>
      <div class="product-body">
        <div class="brand-tag">${p.brand}</div>
        <div class="product-name">${p.name}</div>
        <div class="product-footer">
          <div>
            <div class="price">C$ ${p.price.toLocaleString()}</div>
            ${p.oldPrice ? `<div class="price-old">C$ ${p.oldPrice.toLocaleString()}</div>` : ''}
          </div>
          <button class="add-btn" onclick="quickAdd(event,${p.id})">+</button>
        </div>
      </div>
    </div>
  `).join('');
  document.querySelector('.products-main').scrollIntoView({behavior:'smooth',block:'start'});
}


{{-- Inicial del avatar --}}
<div class="avatar">
    {{ strtoupper(substr(Auth::user()->nombre, 0, 1)) }}
</div>

{{-- Nombre en el header --}}
{{ Auth::user()->nombre_completo }}

{{-- Saludo en el hero --}}
<h1>Hola, <span>{{ Auth::user()->nombre }}</span></h1>

function sortProducts(val){
  currentSort = val;
  renderProducts();
}

// ═══════════════ WISHLIST ═══════════════
function toggleWish(e, id){
  e.stopPropagation();
  if(wishlist.has(id)){ wishlist.delete(id); showToast('❌ Quitado de favoritos'); }
  else { wishlist.add(id); showToast('❤️ Agregado a favoritos'); }
  renderProducts();
}

// ═══════════════ PRODUCT MODAL ═══════════════
function openProduct(id){
  currentProduct = products.find(p=>p.id===id);
  selectedSize = null; selectedColor = null;
  const p = currentProduct;
  
  document.getElementById('pmImg').innerHTML = `<img src="${p.img}" alt="${p.name}">`;
  document.getElementById('pmBrand').textContent = p.brand.toUpperCase();
  document.getElementById('pmName').textContent = p.name;
  document.getElementById('pmPrice').textContent = `C$ ${p.price.toLocaleString()}`;
  document.getElementById('pmDesc').textContent = p.desc;
  
  document.getElementById('pmSizes').innerHTML = p.sizes.map(s =>
    `<button class="size-btn" onclick="selectSize(this,${s})">${s}</button>`
  ).join('');
  
  document.getElementById('pmColors').innerHTML = p.colors.map(c =>
    `<div class="color-dot" style="background:${c}" onclick="selectColor(this,'${c}')"></div>`
  ).join('');

  document.getElementById('productModal').classList.add('open');
  document.getElementById('overlay').classList.add('active');
}

function selectSize(el, size){
  document.querySelectorAll('.size-btn').forEach(b=>b.classList.remove('selected'));
  el.classList.add('selected');
  selectedSize = size;
}
function selectColor(el, color){
  document.querySelectorAll('.color-dot').forEach(d=>d.classList.remove('selected'));
  el.classList.add('selected');
  selectedColor = color;
}
function closeModal(){
  document.getElementById('productModal').classList.remove('open');
  document.getElementById('overlay').classList.remove('active');
}
function addFromModal(){
  if(!currentProduct) return;
  addToCart(currentProduct, selectedSize, selectedColor);
  closeModal();
}
function toggleWishModal(){
  if(!currentProduct) return;
  toggleWish({stopPropagation:()=>{}}, currentProduct.id);
}

// ═══════════════ CART ═══════════════
function quickAdd(e, id){
  e.stopPropagation();
  const p = products.find(x=>x.id===id);
  addToCart(p, null, null);
}

function addToCart(product, size, color){
  const existing = cart.find(i => i.id === product.id && i.size === size && i.color === color);
  if(existing){ existing.qty++; }
  else { cart.push({...product, size, color, qty:1, cartId: Date.now()}); }
  updateCartUI();
  showToast('✓ ' + product.name + ' agregado');
}

function updateCartUI(){
  const total = cart.reduce((s,i)=>s+i.price*i.qty, 0);
  const count = cart.reduce((s,i)=>s+i.qty, 0);
  
  const badge = document.getElementById('cartBadge');
  badge.textContent = count;
  badge.style.display = count > 0 ? 'flex' : 'none';

  const itemsEl = document.getElementById('cartItems');
  if(!cart.length){
    itemsEl.innerHTML = '<div class="cart-empty"><div class="empty-icon">🛒</div><p>Tu carrito está vacío</p></div>';
    document.getElementById('cartSummary').innerHTML = '';
    return;
  }

  itemsEl.innerHTML = cart.map(item => `
    <div class="cart-item">
      <div class="ci-img"><img src="${item.img}" alt="${item.name}"></div>
      <div class="ci-info">
        <div class="ci-name">${item.name}</div>
        <div class="ci-meta">${item.size ? 'Talla '+item.size : 'Sin talla'} ${item.color ? '· '+item.color : ''}</div>
        <div class="ci-price">C$ ${(item.price * item.qty).toLocaleString()}</div>
        <div class="ci-qty">
          <button class="qty-btn" onclick="changeQty(${item.cartId},-1)">−</button>
          <span class="qty-num">${item.qty}</span>
          <button class="qty-btn" onclick="changeQty(${item.cartId},1)">+</button>
        </div>
      </div>
      <button class="ci-del" onclick="removeItem(${item.cartId})" title="Eliminar">🗑</button>
    </div>
  `).join('');

  document.getElementById('cartSummary').innerHTML = `
    <div class="summary-row"><span>Subtotal (${count} art.)</span><span>C$ ${total.toLocaleString()}</span></div>
    <div class="summary-row"><span>Envío</span><span style="color:#16a34a">Gratis 🎉</span></div>
    <div class="summary-row total"><span>Total</span><span>C$ ${total.toLocaleString()}</span></div>
  `;
}

function changeQty(cartId, delta){
  const item = cart.find(i=>i.cartId===cartId);
  if(!item) return;
  item.qty += delta;
  if(item.qty <= 0) cart = cart.filter(i=>i.cartId!==cartId);
  updateCartUI();
}

function removeItem(cartId){
  cart = cart.filter(i=>i.cartId!==cartId);
  updateCartUI();
  showToast('🗑 Producto eliminado');
}

function toggleCart(){
  const sidebar = document.getElementById('cartSidebar');
  const overlay = document.getElementById('overlay');
  sidebar.classList.toggle('open');
  overlay.classList.toggle('active');
}

function closeAll(){
  document.getElementById('cartSidebar').classList.remove('open');
  document.getElementById('productModal').classList.remove('open');
  document.getElementById('overlay').classList.remove('active');
  document.getElementById('userDropdown').classList.remove('open');
}

function checkout(){
  if(!cart.length){ showToast('⚠️ Tu carrito está vacío'); return; }
  showToast('💳 Redirigiendo al pago...');
}

function buyWhatsapp(){
  if(!cart.length){ showToast('⚠️ Agrega productos primero'); return; }
  let msg = 'Hola SaraZapatos! 👟 Quiero ordenar:%0A%0A';
  cart.forEach(item => {
    msg += `• ${item.name}${item.size?' (T.'+item.size+')':''} × ${item.qty} — C$ ${(item.price*item.qty).toLocaleString()}%0A`;
  });
  const total = cart.reduce((s,i)=>s+i.price*i.qty,0);
  msg += `%0A💰 *Total: C$ ${total.toLocaleString()}*%0A%0AEspero su confirmación.`;
  window.open(`https://wa.me/50589455281?text=${msg}`, '_blank');
}

// ═══════════════ USER MENU ═══════════════
function toggleUserMenu(){
  document.getElementById('userDropdown').classList.toggle('open');
}
document.addEventListener('click', e => {
  const pill = document.querySelector('.user-pill');
  if(pill && !pill.contains(e.target)) document.getElementById('userDropdown').classList.remove('open');
});

// ═══════════════ TOAST ═══════════════
let toastTimer;
function showToast(msg){
  const t = document.getElementById('toast');
  t.textContent = msg;
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => t.classList.remove('show'), 2500);
}

// ═══════════════ INIT ═══════════════
renderProducts();
</script>
</body>
</html>
