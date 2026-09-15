<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
</head>
<header>
  <div class="titulo">
    <h1>Panel de Actividades</h1>
    <p>Aqui se suben actividades,anuncios y material de estudio para los alumnos de la escuela tecnica</p>
  </div>
</header>
<body>
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

          <div class="mat-estudio">
            materiales
          </div> <!--clase material de estudio-->
        </div>
      </div>
</div>

  <style>
    /*fondo de la pagina*/
    body{
      background-color:blue;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: var(--text-color);
    }
    /*titulos y textos*/
    header{
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: var(--text-color);
    line-height: 1.6;
    }
   .cont-estudiante{
      display:flex;
      flex-direction:column;
      justify-content:center;
      width:auto;
      background-image: url("\imagenes\matematica.png");
    }
    .conjunto{
      width:auto;
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
   .mat-estudio{
    width:80px;
    height:50px;
    margin:20px;
    align-text:center;
    align-content:center;
    background-color:white;
    cursor:pointer;
   }
    </style>
</div>
</body>
</html>