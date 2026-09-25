<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
</head>
<body>
  <div class="menu-rol">
    <div class="titulo">Escuela Técnica N 1</div>
    <a href="materias.php"class="opciones">
      Materias
    </a>
    <div class="opciones">Configuración</div>
  </div>
  <!--contenedor del contenido estudiante-->
    <div class="cont-estudiante">
      <div class="separador-mats">
        
        <div class="conjunto">
          <div class="ft-profe"> <!--contenedor de la foto-->
            <img src="imagenes/usuario.png" class="fto-usuario"><!--clase de la foto-->
          </div>
            
          <div class="ingreso-mat">
            Historia
          </div><!--clase de la materia-->
        </div>
      </div>
</div>

  <style>
    /*fondo de la pagina*/
    body{
      background-color:white;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: var(--text-color);
    }
    .menu-rol{
      background-color:beige;
      width:20%;
      height:500px;
    }
    .titulo{
      font-family:fantasy;
      font-size:25px;
    }
    .opciones{
    display:flex;
    justify-content:center;
    align-items:center;
    width:100%;
    height:50px;
    font-family:bold;
    cursor:pointer;
    font-size:20px;
    text-decoration:none;
    color:inherit;
    transition: 0.5s;
    }
    .opciones :hover{
      background-color:rgb(71, 29, 224);
    }
   .cont-estudiante{
      display:flex;
      justify-content:center;
      width:auto;
    }
    .conjunto{
      width:80%;
      height:auto;
      display:flex;
      flex-direction:row;
      background-color:yellow;
      align-items:center;
      justify-content:center;
    }
    /*estilos de foto de usuario*/ 
    .fto-usuario{
        width:50px;
        height:50px;
    }
    .ft-profe{
        display:flex;
        flex-direction:column;
        justify-content:center;
        margin:20px;
        border:4px solid black;
        border-radius:48%;
        cursor:pointer;
        transition: 0.5s ease;

    }
    .ft-profe: :hover{
    width: 60vw;
    height: 60vh;
    margin:10px;
    }
    .img-mat{
      overflow:hidden;
      width:100%;
      position:relative;
    }
   .ingreso-mat{
    width:400px;
    height:50px;
    align-text:center;
    align-content:center;
    margin:20px;
    background-color:white;
    cursor:pointer;
   }
    </style>
</div>
</body>
</html>