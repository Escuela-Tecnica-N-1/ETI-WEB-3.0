<!--boton de acceso al menu de estudiantes-->
<button aria-label="menu Desplegable" class="menu-header" id="menuHeader" aria-expanded="false" aria-controls="menuDesplegable">
        <img src="imagenes/usuario.png" alt="cuenta de usuario" class="ft-usuario">
      </button>
   
<!--oculta el menu-->
<div id="overlay" tabindex="-1" class="overlay"></div>
  <div id="menuDesplegable" class="menu-principal">
<!--links-->
    <a href="rol-estudiante.php" tabindex="-1">Materias</a>
    <a href="rol-estudiante.php" tabindex="-1">Configuracion</a>
  </div>
    <style>
  /*cuando sea menor a 768,desaparece el boton para que aparezca el de celular*/
  @media (max-width:768px){
    .menu-header{
      display:none;
    }
  }
  .menu-header{
    width: 50px;
    height:50px;
    border-radius:60px;
    cursor:pointer;
   
  }
  /*foto de la cuenta del usuario(temporal)*/
  .ft-usuario{
    height: 30px;
    width: 30px;
  }
  .menu-principal{
    position:fixed;
    display:flex;
    width: 110px;
    height: 150px;
    box-shadow: 0 0 8px rgba(0,0,0,0.6);
    background-color:rgb(220, 220, 230);
    flex-direction:column;
    justify-content:center;
    align-items:center;
    gap:20px;
    transform:translateX(-20px);
    opacity:0;
    visibility:hidden;
    transition:0.3s ease;
    z-index:100;
    right:20px;
    top:25px;
    border-radius:10px;
    font-size:17px;    
    font-weight:bold;
  }
  .menu-principal.active{
    transform:translateX(0);
    opacity:1;
    visibility:visible;
  }
  
</style>
<script>
  //llama a las clases//
const menuHeader = document.getElementById('menuHeader');
const menuDesplegable = document.getElementById('menuDesplegable');
const overlay = document.getElementById('overlay');
//cuando haga click se activa o abre el menu//
menuHeader.addEventListener('click', () => {

  menuDesplegable.classList.toggle('active');
  overlay.classList.toggle('active');

  const abierto = menuDesplegable.classList.contains('active');

  menuHeader.setAttribute('aria-expanded', abierto);

});
//cuando se vuelva a clickear se cierra//
overlay.addEventListener('click', () => {

  menuDesplegable.classList.remove('active');
  overlay.classList.remove('active');

  menuHeader.setAttribute('aria-expanded', 'false');

});
</script>

  