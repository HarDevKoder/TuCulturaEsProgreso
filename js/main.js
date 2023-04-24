// ---------------------------------------------------------------------
// Efecto toggle para mostrar-ocultar el menu movil
// ---------------------------------------------------------------------
$(document).ready(main);
var contador = 1;
function main() {
  $(".menu_bar span").click(function (e) {
    e.preventDefault(); //Se evita que regrese al inicio al presionar hamburguesa
    if (contador == 1) {
      $("nav").animate({
        left: "0",
      });
      contador = 0;
    } else {
      contador = 1;
      $("nav").animate({
        left: "-100%",
      });
    }
  });
  // --------------------------------------------------------------------------
  // Al hacer clic sobre los enlaces del menu, oculta el panel de navegación
  // --------------------------------------------------------------------------
  $("header nav ul li a").click(function () {
    contador = 1;
    $("nav").animate({
      left: "-100%",
    });
  });
}
// --------------------------------------------------------------------------
// Mensaje de advertencia al pagar la compra directa
// --------------------------------------------------------------------------
const mensaje = () => {
  alert(
    'Advertencia:\nRecuerda dar click en "Volver al sitio de la tienda" de la página de PAYU luego de realizar el pago para realizar la descarga'
  );
};

var mensajeCompraDirecta = document.getElementById("linkCompraDirecta");
mensajeCompraDirecta.addEventListener("click", mensaje);

// --------------------------------------------------------------------------
// Overlay para mostrar codigos QR
// --------------------------------------------------------------------------
// Oculta el overlay al presionar la x
function overlayClose() {
  document.getElementById("overlay").style.display = "none";
  document
    .querySelectorAll('input[name="tipoPago"]')
    .forEach((x) => (x.checked = false));
}

// Muestra el Overlay al presionr boton de pago con QR
function overlayShow() {
  if (!document.querySelector('input[name="tipoPago"]:checked')) {
    alert("Error, Selecciona un tipo de Pago");
  } else {
    document.getElementById("overlay").style.display = "block";
  }
}