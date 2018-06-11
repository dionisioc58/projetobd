<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Agendamento</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="_css/estilo.css" type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Barra de Menu e Head-->
    <div class="w3-top">
      <div class="w3-bar w3-light-blue">
          <a href="#home" class="w3-bar-item w3-button w3-hover-blue"><img class="w3-image" 
          src="_imagens/logo.png" style="max-width:60%; height="auto""></a>
          <a href="#home" class="w3-bar-item w3-button w3-hover-blue"> <h1 style= "color:white">Hi-Car</h1></a>
        <div class="w3-top w3-text-white" id="icones">
            <div class="w3-dropdown-hover w3-right w3-light-blue">
              <i class="material-icons w3-xxlarge  w3-padding-large w3-margin-top w3-text-white">person</i> 
              <div class="w3-dropdown-content w3-bar-block w3-border">
                <a href="#" class="w3-bar-item w3-button w3-hover-blue">Perfil</a>
                <a href="#" class="w3-bar-item w3-button w3-hover-blue">Sair</a>
              </div> 
            </div>
        <div class="w3-dropdown-hover w3-right w3-light-blue">
          <i class="material-icons w3-xxlarge w3-right w3-padding-large w3-margin-top w3-text-white">directions_car</i>
            <div class="w3-dropdown-content">
              <a href="#" class="w3-bar-item w3-button w3-hover-blue">Meus Automóveis</a>
            </div> 
        </div>
        <i class="material-icons w3-xxlarge w3-right w3-padding-large w3-margin-top">ic_notifications</i>
     </div>
    </div>
    </div>
  </head>
  <!--Corpo da Pagina - Formulario de Agendamento -->
  <body>
    <div class="Agendamento w3-display-container w3-padding" style="margin-top: 7%">
      <div class="w3-content w3-margin-top w3-padding" style="max-width:50%; opacity: 0.95;">
        <div class="w3-content w3-container w3-center w3-padding-64 w3-align w3-margin-top" id="agendar">
          <form class="w3-container w3-card-4" action="/action_page.php">
            <h3 class="w3-center">Agendamento de Serviços</h3>  
              <div class="w3-section">
                <select class="w3-select" name="option">
                  <option value="" disabled selected>Selecione uma Concessionária</option>
                  <option value="1">Concessionária 1</option>
                  <option value="2">Concessionária 2</option>
                  <option value="3">Concessionária 3</option>
                </select>
              </div>
              <div class="w3-section">
                <select class="w3-select" name="option">
                  <option value="" disabled selected>Selecione o tipo de serviço</option>
                  <option value="1">Revisão</option>
                  <option value="2">Balanceamento</option>
                  <option value="3">Troca de óleo</option>
                </select>
              </div>
              <div class="w3-section w3-left">
                <form class="w3-container w3-card-4" action="/action_page.php">
                  Selecione a Data:
                  <input type="date" name="data-agendamento">
              </div>
              <div class="w3-section w3-right">
                <form class="w3-container w3-card-4" action="/action_page.php">
                    Selecione a Hora:
                  <input type="time" name="horario-agendamento">
              </div><br/><br/>
              <div class="w3-section w3-right">
                <button class="w3-right w3-button w3-margin-bottom w3-blue w3-hover-light-blue w3-round-xlarge" type="submit">Confirmar Agendamento</button>
                <a href="index.html" type="button" class="w3-right w3-button w3-text-red w3-hover-red w3-round-xlarge w3-margin-right">Cancelar</a><br>
              </div>  
          </form>
        </div>
      </div>
    </div>
  </body>
</html> 
              
               
            