<!--boton de acceso al menu de estudiantes-->
<button aria-label="menu Desplegable" class="menu-header" id="menuHeader" aria-expanded="false" aria-controls="menuDesplegable">
  <img src="imagenes\bt-usuario.png" alt="cuenta de usuario" class="ft-usuario">
</button>
   
<!--oculta el menu-->
<div id="ovlay" tabindex="-1" class="ovlay"></div>
<div id="menuDesplegable" class="menu-principal">
  <!--links-->
  <a href="" tabindex="-1">Panel de Administrador</a>
  <a href="" tabindex="-1">Configuracion</a>
</div>
<style>
  /*cuando sea menor a 768,desaparece el boton para que aparezca el de celular*/
  @media (max-width:768px){
    .menu-header{
      display:none;
    }
  }
  .menu-header{
    height:50px;
    width:50px;
    border-radius:60px;
    cursor:pointer;
  }
  /*foto de la cuenta del usuario(temporal)*/
  .ft-usuario{
    width:100%;
    height:100%;
  }
    /* Menú */
  .menu-principal {
    position: fixed;
    display: flex;
    width: 150px;
    height: 150px;
    right: 20px;
    top: 60px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 20px;
    background-color: rgb(220, 220, 230);
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
    border-radius: 10px;
    font-size: 17px;
    font-weight: bold;
    transform: translateY(-10px);
    opacity: 0;
    visibility: hidden;
    transition:opacity 0.3s ease,transform 0.3s ease,visibility 0.3s ease;
    z-index: 100;
  }
  .menu-principal.active {
    transform: translateY(0);
    opacity: 1;
    visibility: visible;
  }
  .ovlay {
    position: absolute;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.2);
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease;
    z-index: 99;
  }
  .ovlay.active {
    opacity: 1;
    visibility: visible;
  }
</style>
<script>
  //llama a las clases//
const menuHeader = document.getElementById('menuHeader');
const menuDesplegable = document.getElementById('menuDesplegable');
const ovlay = document.getElementById('ovlay');
//cuando haga click se activa o abre el menu//
menuHeader.addEventListener('click', () => {

  menuDesplegable.classList.toggle('active');
  ovlay.classList.toggle('active');

  const abierto = menuDesplegable.classList.contains('active');

  menuHeader.setAttribute('aria-expanded', abierto);

});
//cuando se vuelva a clickear se cierra//
ovlay.addEventListener('click', () => {

  menuDesplegable.classList.remove('active');
  ovlay.classList.remove('active');

  menuHeader.setAttribute('aria-expanded', 'false');

});
</script>

  