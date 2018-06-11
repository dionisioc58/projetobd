<?php
	session_start();
	if(!isset($_SESSION['usuario'])) {
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Usuário</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="_css/estilo.css" type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <div class="w3-top">
      <div class="w3-bar w3-light-blue" id="myNavbar">
        <a href="index.html"><img class="w3-image w3-bar-item" 
        src="_imagens/logo.png" style="width:10%"></a>
        <span class="w3-bar-item w3-text-white w3-xxlarge">Hi-Car</span>
      </div>
    </div>

      <div class="w3-top w3-right" id="icones">
        <div class="w3-dropdown-hover w3-right w3-light-blue">
          <i class="material-icons w3-xxlarge  w3-padding-large w3-margin-top w3-text-white ">person</i> 
          <a href="#" class="w3-dropdown-content w3-bar-block w3-border w3-bar-item w3-button w3-hover-blue">Perfil</a>
          <a href="logout.php" class="w3-dropdown-content w3-bar-block w3-border w3-bar-item w3-button w3-hover-blue">Sair</a>
        </div>     
        <i class="fa fa-envelope w3-xxlarge w3-right w3-padding-large w3-margin-top w3-text-white"></i>
        <i class="material-icons w3-xxlarge w3-right w3-padding-large w3-margin-top w3-text-white">ic_notifications</i>
        <button class="w3-btn w3-blue w3-round-large w3-right w3-margin-top" style="max-width:20%">Meus Veículos<i class="w3-right material-icons">ic_directions_car</i></button>
      </div>
  </head>

  <body>
    <div class="w3-content w3-display-container" w3-opacity-min style="max-width:100%; height="auto"">
      <img class="mySlides w3-image" src="_imagens/app.jpeg" alt="hi-car" style="max-width:100%; height="auto" ">
      <img class="mySlides w3-image" src="_imagens/mec2.jpg" alt="mecanico atualizado" style="max-width:100%; height:auto;">
      <img class="mySlides w3-image" src="_imagens/mecanica.jpg" alt="trabalho eficaz" style="max-width:100%; height:auto;">
      <img class="mySlides w3-image" src="_imagens/cliente.jpg" alt="cliente satisfeito" style="max-width:100%; height:auto;">
      <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="max-width:100%; height:auto;">
        <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
        <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(4)"></span>
      </div>
    </div>

       <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function currentDiv(n) {
      showDivs(slideIndex = n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      if (n > x.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";  
        }
      for (i = 0; i < dots.length; i++) {
         dots[i].className = dots[i].className.replace(" w3-white", "");
      }
      x[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " w3-white";
    }
  </script>

  <br/><br/>

      <!-- Container (About Section) -->
    <div class="w3-content w3-container w3-center w3-padding-64 w3-align" id="sobre">
        <h3 class="w3-center">Hi-Car</h3>
        <pre class="w3-center w3-align">
        O Hi-Car é uma plataforma de gerenciamento de serviços 
      para concessionárias criado com o objetivo de melhorar 
  as atividades oferecidas aos proprietários dos veículos, 
  visando aproximar as empresas de seus clientes 
    </pre>
    </p>
    </div>
  
   <!-- Second Parallax Image with Portfolio Text -->
    <div id="portfolio" class="bgimg2 w3-display-container w3-opacity-min">
        <div class="w3-display-middle">
          <span class="w3-xxlarge w3-text-white w3-wide w3-image">PORTFOLIO</span>
        </div>
      </div>
  
  <div class="w3-row w3-center w3-dark-grey w3-padding-16">
    <div class="w3-quarter w3-section">
      <span class="w3-xlarge">14+</span><br>
      PARCEIROS
    </div>
    <div class="w3-quarter w3-section">
      <span class="w3-xlarge">10+</span><br>
      PROJETOS PRONTOS
    </div>
    <div class="w3-quarter w3-section">
      <span class="w3-xlarge">33+</span><br>
      CLIENTES SATISFEITOS
    </div>
    <div class="w3-quarter w3-section">
      <span class="w3-xlarge">80+</span><br>
      REUNIÕES
    </div>
  </div>

  <!-- Container (Portfolio Section) -->
  <div class="w3-content w3-container w3-padding-64">
    <h3 class="w3-center">EMPRESAS ASSOCIADAS: </h3>
    <br>
    <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
    <div class="w3-row-padding w3-center">
  
      <div class="w3-col m3 w3-image">
        <img src="_imagens/chevrolet.jpeg" style="max-width:100%; height:50%; " onclick="onClick(this)" class="w3-hover-opacity" alt="Chevrolet">
      </div>

      <div class="w3-col m3 w3-image">
        <img src="_imagens/volkswagen.jpeg" style="max-width:80%; height:auto;" onclick="onClick(this)" class="w3-hover-opacity" alt="Volkswagen">
      </div>

      <div class="w3-col m3 w3-image w3-margin-top">
        <img src="_imagens/toyota.jpg" style="max-width:100%; min-height:100%;" onclick="onClick(this)" class="w3-hover-opacity" alt="Toyota">
      </div>

      <div class="w3-col m3 w3-third w3-container w3-image w3-margin-top w3-padding-24">
        <img src="_imagens/ford.jpeg" style="max-width:100%; height:auto;" onclick="onClick(this)" class="w3-hover-opacity" alt="Ford">
      </div>

      <button class="w3-button w3-padding-large w3-light-grey" style="margin-top:128px">CARREGUE MAIS</button>
    </div>
  </div>
      
    </div>
  </div>

<!-- Container (Contact Section) -->
  <div class="w3-content w3-container w3-padding-64" id="contato">
    <h3 class="w3-center">CONTATO: </h3>
  
    <div class="w3-row w3-padding-32 w3-section">
      <div class="w3-col m4 w3-container">
        <!-- Add Google Maps -->
        <div id="googleMap" style="max-width:100%;height:400px;"></div>

<script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(-5.8323987, -35.2054445),
    zoom:10,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyAFgsQdSWE171NyNC8Q8S1UdwUzFohSE3A
&callback=myMap"></script>
      </div>
      <div class="w3-col m8 w3-panel">
        <div class="w3-large w3-margin-bottom">
          <i class="fa fa-map-marker fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Natal, BR<br>
          <i class="fa fa-phone fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Telefone: +55 32323232<br>
          <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Email: carro@hicar.com<br>
        </div>

        <p> Envie uma mensagem:</p>
        <form action="/action_page.php" target="_blank">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Nome" required name="Nome">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
            </div>
          </div>
          <input class="w3-input w3-border" type="text" placeholder="Mensagem" required name="Mensagem">
          <button class="w3-button w3-black w3-right w3-section" type="submit">
            <i class="fa fa-paper-plane"></i> ENVIAR MENSAGEM
          </button>
        </form>
      </div>
    </div>
  </div>
  
    <!-- Footer -->
    <footer class="w3-center w3-dark-grey w3-padding-48 w3-image">
      <img class="w3-center" src="_imagens/redes-sociais.png" style="width:10%" onclick="onClick(this)" class="w3-hover-opacity">
      <br/><br/>
      <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>Voltar para o início</a>
        <br/><br/>
        <p class="w3-center w3-align">© 2018 Hi-Car All Rights Reserved</p>
    </footer>
  </body>
</html> 
