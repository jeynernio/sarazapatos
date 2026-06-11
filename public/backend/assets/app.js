function scrollToSection(id){
  document.getElementById(id).scrollIntoView({behavior:"smooth"});
}

/* WHATSAPP */
function openWhatsApp(){
  window.open(
    "https://wa.me/50589455281?text=Hola%20quiero%20comprar%20zapatos%20de%20SaraZapatos",
    "_blank"
  );
}

/* LOGIN */
function openLogin(){
  document.getElementById("loginModal").style.display="flex";
}

function closeLogin(){
  document.getElementById("loginModal").style.display="none";
}

function login(){
  let u=document.getElementById("user").value;
  let p=document.getElementById("pass").value;

  if(u==="admin" && p==="1234"){
    document.getElementById("msg").style.color="lightgreen";
    document.getElementById("msg").innerText="Acceso correcto 🚀";
  }else{
    document.getElementById("msg").style.color="red";
    document.getElementById("msg").innerText="Datos incorrectos";
  }
}

function sendMessage(e) {
  e.preventDefault();

  let nombre = document.getElementById("nombre").value;
  let email = document.getElementById("email").value;
  let mensaje = document.getElementById("mensaje").value;

  let texto = `Hola, soy ${nombre}%0AEmail: ${email}%0AMensaje: ${mensaje}`;

  window.open(`https://wa.me/505XXXXXXXX?text=${texto}`, '_blank');
}