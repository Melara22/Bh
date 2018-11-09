<!--GET IMAGES-->
<style>

a{
  transition: all 0.4s ease 0s;
  -moz-transition: all 0.4s ease 0s;
  -webkit-transition: all 0.4s ease 0s;
  -o-transition: all 0.4s ease 0s;
}


.categoriafoto{
  width: 500px;
  margin: auto;
  margin-top: 10px;
  margin-bottom: 10px;
}

#canvas-cropit{position: absolute; z-index:1000; top:0;}

.wrapper-module-getimage{
background: #f5f5f4;
position: fixed;
left: 0;
right: 0;
top: 0;
bottom: 0;
z-index: 5000;
padding-top: 54px;
}
.wrapper-module-getimage a.close {

font-size: 1.6em;
color: #333!important;
opacity: 1;
    margin-top: 15px;
}


#grid-pictures-fb{overflow-x: auto}  
.wrapper-module-getimage .actions-module-getimage { display: inline;}
.wrapper-module-getimage .actions-module-getimage a{
margin-left: 25px;
font-size: 1.2em;
margin-right: 25px;
color: #fff;
font-weight: 400;
padding: 8px;
}
.wrapper-module-getimage .actions-module-getimage a:hover{
background: #a90b1e;
border-radius: 10px;
}


.wrapper-module-getimage .btn-back-album-fb{position: relative; z-index: 10;}


/*WEBCAM*/
.wrapper-module-getimage #wrapper-webcam{
margin: auto;
position: relative;
top:0;
}
.wrapper-module-getimage #wrapper-webcam-html5, .wrapper-module-getimage #webcam-preview{
    margin: auto;
    position: relative;
    text-align: center;
    left: 50%;
    margin-left: -200px;
    margin-top: 60px;
}

.wrapper-module-getimage #wrapper-webcam-html5 canvas{
  margin: auto;
}

.wrapper-module-getimage #webcam-btns-wrapper{
position: absolute;
z-index: 100;
top: 9%;
width:100%;
text-align: center
}

/*WEBCAM*/

.wrapper-module-getimage .cropit-image-preview {
background-size: cover;
border-radius: 3px;
margin-top: 7px;
width: 500px;
height: 500px;
cursor: move;
margin: auto;
}

.wrapper-module-getimage .cropit-image-background {
opacity: .2;
cursor: auto;
}

.wrapper-module-getimage .cropit-image-preview-container{
position: relative;
margin: auto!important;
}

.wrapper-module-getimage .wrapper-cropit{
width:100%; display:block; position:relative;
}

.wrapper-module-getimage .wrapper-cropit-btns{
position: relative;
width: 100%;
z-index: 1;
}
.wrapper-module-getimage .wrapper-zoom-input {
    position: absolute;
    width: 500px;
    left: 50%;
    background: rgba(29, 28, 28, 0.65);
    height: 58px;
    top: 45px;
    margin-left: -250px;
}
.wrapper-module-getimage .wrapper-zoom-input input {
position: relative;
top: 23px;
left: 50%;
width: 150px;
margin-left: -75px;
}

.wrapper-filter{
position: relative;
width: 100%;
}
.wrapper-filter #menu-presets{padding-left: 0; margin-left: 0; background: rgba(0, 0, 0, 0.72);
padding: 20px;
border-radius: 10px;}
.wrapper-filter #menu-presets li{list-style: none; margin-top: 3px; margin-bottom: 3px}
.wrapper-filter #menu-presets  li a{color: #fff!important;
padding: 5px;
/* font-weight: 800; */
font-size: 1.2em;
font-weight: 400; border-radius: 4px}
.wrapper-filter #menu-presets li h2{margin-top: 0;}
.wrapper-filter #menu-presets li a:hover, .wrapper-filter #menu-presets li a.active{background: #2b55a2}
.wrapper-filter .wrapper-filter-btns{margin-top: 10px; margin-bottom: 10px}
.wrapper-upload-file h4{color:#333!important;}
  
.btn-morealbum, .btn-morephoto{
  background: #eaeaea;
} 
.btn-morealbum span.icomoon-plus, .btn-morephoto span.icomoon-plus{
color: #D0D0D0;
font-size: 3em;
position: absolute;
top: 50%;
left: 50%;
margin-left: -22px;
margin-top: -22px;

}

#grid-main {
}

/*
.intro {
    display: table;
}

.intro {
    background: rgba(0, 0, 0, 0.82);
    position: absolute;
    height: 100%;
    width: 100%;
    overflow: hidden;
    z-index: 5000;
}
*/

.wrapper-intro {
    display: table-cell;
    vertical-align: middle;
    padding-bottom: 30px;
    width: 100%;
    height: 100%;
    position: static;
    z-index: 100;
}

.intro .background{
  position: absolute!important;
  z-index: -5;
}

.intro .overlay{
    background: background: rgba(0, 0, 0, 0.5);
    position: absolute;
    height: 100%;
    width: 100%;
    overflow: hidden;
    z-index: -1;
}

.btn-subirnomenu{
  position: fixed;
  width: 100%;
  top: 50px;
  z-index: 2;
}

.cropit-image-background-container{
  left: 50%!important;
  margin-left: -250px!important;
}

.module-form{
  /*margin-left: 10%;
  margin-right: 10%;
  background: rgba(0, 0, 0, .5);
  padding: 20px;
  border-radius: 20px;
  color: #fff;*/
  /*width: 450px;*/
  width: 100%;
  height: 100vh;
  margin: 0 auto;
  position: relative;
}

.btn-pink { 
  color: #FFFFFF; 
  background-color: #E50B89; 
  border-color: #E50B89; 
} 

.btn-fbblue { 
  color: #FFFFFF; 
  background-color: #4267b2; 
  border-color: #4267b2; 
} 

.btn-fbblue:hover, 
.btn-fbblue:focus, 
.btn-fbblue:active, 
.btn-fbblue.active, 
.open .dropdown-toggle.btn-fbblue { 
  color: #FFFFFF; 
  background-color: #34528f; 
  border-color: #34528f; 
} 
 
.btn-pink:hover, 
.btn-pink:focus, 
.btn-pink:active, 
.btn-pink.active, 
.open .dropdown-toggle.btn-pink { 
  color: #FFFFFF; 
  background-color: #e50b89; 
  border-color: #E50B89; 
} 
 
.btn-pink:active, 
.btn-pink.active, 
.open .dropdown-toggle.btn-pink { 
  background-image: none; 
} 
 
.btn-pink.disabled, 
.btn-pink[disabled], 
fieldset[disabled] .btn-pink, 
.btn-pink.disabled:hover, 
.btn-pink[disabled]:hover, 
fieldset[disabled] .btn-pink:hover, 
.btn-pink.disabled:focus, 
.btn-pink[disabled]:focus, 
fieldset[disabled] .btn-pink:focus, 
.btn-pink.disabled:active, 
.btn-pink[disabled]:active, 
fieldset[disabled] .btn-pink:active, 
.btn-pink.disabled.active, 
.btn-pink[disabled].active, 
fieldset[disabled] .btn-pink.active { 
  background-color: #E50B89; 
  border-color: #E50B89; 
} 
 
.btn-pink .badge { 
  color: #E50B89; 
  background-color: #FFFFFF; 
}

.btn-link {
    color: #fff!important;
    text-decoration: underline!important;
    background-color: transparent;
}

.wrapper-upload-file{
top: 50%;
    position: relative;
}

.play-container-game2{ width: 95%; height: 500px; margin: 50px auto 0 auto; position: relative; max-width: 300px; }
.level1 .playlevel1, .level2 .playlevel2{ width: 100%; height: 100%; position: absolute; z-index: 99; left: 0; top: 0; bottom:0; background: rgba(0,0,0,.7); }
.level2 > .playlevel2 > div > div > a,
.level1 > .playlevel1 > div > div > a{ display: block;  }
.level2 > .playlevel2 > div > div > a > .fa,
.level1 > .playlevel1 > div > div > a > .fa{ font-size: 6em; color: #8ea106; } 

.level2_p1_001{ background: url(img/game/level2/usr1_level2_player_monop_normal.png) center top no-repeat; }
.level2_p1_002{ background: url(img/game/usr1_level2_player_monop_happy.png) center top no-repeat; }
.level2_p1_003{ background: url(img/game/usr1_level2_player_monop_angry.png) center top no-repeat; }

.level2_p2_001{ background: url(img/game/level2/usr2_level2_npc_monop_normal.png) center bottom no-repeat; }
.level2_p2_002{ background: url(img/game/usr2_level2_npc_monop_happy.png) center bottom no-repeat; }
.level2_p2_003{ background: url(img/game/usr2_level2_npc_monop_normal.png) center bottom no-repeat; }


.gamer1, .gamer2{ width: 100%; height: 50%; float: left; position: relative; }
.gamer1 .table1{ padding-left: 2px; position: absolute; width: 100%; bottom: 0; height: 120px; background: white; overflow: hidden; }
.gamer1 .table1 .inner{ position: relative; width: 100%; height: 100%; }
.gamer2 .table2{ padding-left: 2px; position: absolute; width: 100%; top: 3px; height: 120px; background: white; overflow: hidden; -ms-transform: rotate(180deg); /* IE 9 */
    -webkit-transform: rotate(180deg); /* Chrome, Safari, Opera */
    transform: rotate(180deg);
}
.coin-red{ position: absolute; background: #f15a24; float:left; border: 4px solid #c1272d; width: 25px; height: 25px; border-radius: 50px; }
.coin-green{ position: absolute; background: #39b54a; float:left; border: 4px solid #006837; width: 25px; height: 25px; border-radius: 50px; }

/*
#bdd73e
#007550
*/

.full-lightbox{ width: 100%; height: 100vh; position: fixed; background: black; top: 0; bottom: 0; left: 0; right: 0; z-index: 9998; }
.inner-container-lightbox{ overflow: hidden; width: 60%; height: 80vh; margin: 0 auto; background: white; border-radius: 5px; padding: 25px 25px 100px 25px; color: #007550; position: relative; }
.inner-text{ width: 100%; height: 100%; overflow-y: auto; padding: 0 15px; position: relative; }
.inner-text.line{ border-bottom: 1px solid #e1e1e1; }

.inner-container-lightbox ul{ padding: 0 0 0 25px;  }
.inner-container-lightbox p, .inner-container-lightbox ul{ text-align: justify; }

.button-aceptar{ width: 100px; background: #007550; color: white; border: 4px solid #bdd73e; padding: 8px 12px; border-radius: 5px; position: absolute; bottom: 30px; left: 50%; margin-left: -50px; text-align: center; z-index: 999; }
.button-aceptar:hover, .button-aceptar:active, .button-aceptar:focus{ opacity: .8; color: black; }

.main-logo-index{ width: 400px; height: 70vh; background: url("images/main-back-home.png"); background-size: cover; background-position: center bottom; float: left; }
.button-logo-container{ background: white; width: 400px; height: 30vh; float: left; }
.button-logo-container > a{ max-width: 90%; display: block; margin : 15px auto; }

.logo-fedecredito{ max-width: 150px; height: auto; display: block; position: absolute; top: 10px; left: 50%; margin-left: -75px; z-index: 999; }



#c2canvasdiv{ position: relative; }
#show-score{ width: 50px; height: 50px; position: absolute; top: 15px; right: 15px; z-index: 999; border: 0; background: transparent; }
#show-score img{ width: 100%;  }

.inner-score{ width: 50%; height: auto; display: block; margin: 0 auto; border: 0 black solid; margin-top: 50px; }
.single-score{ overflow: hidden; margin-bottom: 5px; padding-bottom: 5px; border-bottom: 1px dashed #bdd73e; }
.name-score{ float: left;  }
.numb-score{ float: right; }

a.close-score{ display: block; margin: 0 auto;  }
a.close-score .fa{ text-align: center; margin: 0 auto; display: block; font-size: 45px; color: #bdd73e; }

.banner1-container{ position: absolute; left: 20%; z-index: 9; }
.banner2-container{ position: absolute; right: 20%; z-index: 9; }

@media (max-width: 1064px) {

  .banner1-container{left: 10%; }
  .banner2-container{ right: 10%; }

}

@media (max-width: 768px) {

  .inner-container-lightbox{ width: 90%; }
  .main-logo-index{ width: 100%; height: 50vh; }
  .button-logo-container{ width: 100%; height: 50vh; }

  #show-score{ width: 30px; height: 30px; }

  .inner-score{ width: 95%; }

  .home-logo{ width: 100%; }

}

</style>

<img src="images/main-logo-index.png" class="logo-fedecredito">

<?php


if(isset($_GET["tp"]) && ($_GET["tp"]==1) )
{

  $user_id = session::get (FB_APP_SECRET.'.id');

    if( $db->HasRecords("SELECT * FROM ".APP_DATA_TABLE_DEFAULT."_scoresxusuario where fbid = '".$user_id."' and open = 1; ")  ){

      $verificar=$db->RecordsObject();
      $idreg = $verificar[0]->idreg;

      $db->Query("update ".APP_DATA_TABLE_DEFAULT."_scoresxusuario set open = 0 where fbid = '".$user_id."' and idreg =".$idreg.";");

      $_SESSION["partidacreada"] = 0;
      //session_destroy();

    }
}


function verificar_sesion()
{

  global $ac_facebook;

  if( ! $ac_facebook ){

    ?>
    <script>
      location.href = "index.php";
    </script>
    <?php

  }

}
?>
<div class="h100vh banner1-container hidden-xs hidden-sm">
  <div class="dtable">
    <div class="innerd">
      <a href="https://www.fedecredito.com.sv/remesas.php" target="_blank">
        <img src="images/banner/banner1.jpg" class="img-responsive">
      </a>
    </div>
  </div>
</div>

<div class="h100vh banner2-container hidden-xs hidden-sm">
  <div class="dtable">
    <div class="innerd">
      <a href="https://www.fedecredito.com.sv/remesas.php" target="_blank">
        <img src="images/banner/banner2.jpg" class="img-responsive">
      </a>
    </div>
  </div>
</div>
<?php
if( $ac_facebook ){
?>
    
    <div id="scores" class="full-lightbox hidden">

      <div class="dtable">
        <div class="innerd">
          <div class="inner-container-lightbox">

            <a href="javascript:;" class="close-score">
              <i class="fa fa-times-circle" aria-hidden="true"></i>
            </a>

            <h1 class="text-center">PUNTAJE</h1>

            <div class="inner-score">

            <?php
            //SELECT distinct s.idreg, s.fbid, s.score FROM `latin_fedecreditonavidad17_scoresxusuario` s group by s.score order by s.score desc 
            if( $db->HasRecords("SELECT * FROM `latin_fedecreditonavidad17_scoresxusuario` s inner join latin_fedecreditonavidad17_usuario u on u.fbid = s.fbid group by s.score order by s.score desc limit 1;") )
            {

              $primerlugar=$db->RecordsObject();
              $fbidprimerlugar = $primerlugar[0]->fbid;
              $scoreprimerlugar = $primerlugar[0]->score;
              echo "<div class='row no-margin single-score'>";
              echo "<h2 class='no-margin name-score'>".$primerlugar[0]->nombre."</h2><h2 class='no-margin numb-score'>".$primerlugar[0]->score."</h2>";
              echo "</div>";

            }

            if( $db->HasRecords("SELECT * 
                  FROM 
                  `latin_fedecreditonavidad17_scoresxusuario` s 
                  inner join latin_fedecreditonavidad17_usuario u on u.fbid = s.fbid
                  where s.fbid <> '".$fbidprimerlugar."' and s.score < ".$scoreprimerlugar."
                  group by s.score 
                  order by s.score desc limit 1;") )
            {

              $segundolugar=$db->RecordsObject();
              $fbidsegundolugar = $segundolugar[0]->fbid;
              $scoresegundolugar = $segundolugar[0]->score;
              echo "<div class='row no-margin single-score'>";
              echo "<h2 class='no-margin name-score'>".$segundolugar[0]->nombre."</h2><h2 class='no-margin numb-score'>".$segundolugar[0]->score."</h2>";
              echo "</div>";

            }

            if( $db->HasRecords("SELECT * 
                  FROM 
                  `latin_fedecreditonavidad17_scoresxusuario` s 
                  inner join latin_fedecreditonavidad17_usuario u on u.fbid = s.fbid
                  where s.fbid not in( '".$fbidsegundolugar."', '".$fbidprimerlugar."' ) and s.score < ".$scoresegundolugar."
                  group by s.score 
                  order by s.score desc limit 1;") )
            {

              $tercerlugar=$db->RecordsObject();
              $fbidtercerlugar = $tercerlugar[0]->fbid;
              $scoretercerlugar = $tercerlugar[0]->score;
              echo "<div class='row no-margin single-score'>";
              echo "<h2 class='no-margin name-score'>".$tercerlugar[0]->nombre."</h2><h2 class='no-margin numb-score'>".$tercerlugar[0]->score."</h2>";
              echo "</div>";

            }

            if( $db->HasRecords("SELECT * 
                  FROM 
                  `latin_fedecreditonavidad17_scoresxusuario` s 
                  inner join latin_fedecreditonavidad17_usuario u on u.fbid = s.fbid
                  where s.fbid not in( '".$fbidsegundolugar."', '".$fbidprimerlugar."', '".$fbidtercerlugar."' ) and s.score < ".$scoretercerlugar."
                  group by s.score 
                  order by s.score desc limit 1;") )
            {

              $cuartolugar=$db->RecordsObject();
              $fbidcuartolugar = $cuartolugar[0]->fbid;
              $scorecuartolugar = $cuartolugar[0]->score;
              echo "<div class='row no-margin single-score'>";
              echo "<h2 class='no-margin name-score'>".$cuartolugar[0]->nombre."</h2><h2 class='no-margin numb-score'>".$cuartolugar[0]->score."</h2>";
              echo "</div>";

            }

            if( $db->HasRecords("SELECT * 
                  FROM 
                  `latin_fedecreditonavidad17_scoresxusuario` s 
                  inner join latin_fedecreditonavidad17_usuario u on u.fbid = s.fbid
                  where s.fbid not in( '".$fbidsegundolugar."', '".$fbidprimerlugar."', '".$fbidtercerlugar."', '".$fbidcuartolugar."' ) and s.score < ".$scorecuartolugar."
                  group by s.score 
                  order by s.score desc limit 1;") )
            {

              $quintolugar=$db->RecordsObject();
              $fbidquintolugar = $quintolugar[0]->fbid;
              $scorequintolugar = $quintolugar[0]->score;
              echo "<div class='row no-margin single-score'>";
              echo "<h2 class='no-margin name-score'>".$quintolugar[0]->nombre."</h2><h2 class='no-margin numb-score'>".$quintolugar[0]->score."</h2>";
              echo "</div>";

            }

            ?>

            </div>

          </div>
        </div>
      </div>
    </div>


    <div id="show-term-cond" class="full-lightbox ">

      <div class="dtable">
        <div class="innerd">
          <div class="inner-container-lightbox">
            
            <div class="inner-text line">
            <h2 class="no-margin text-center"><b>INSTRUCCIONES</b></h2>
            <p align="justify">La Manita Amiga necesita tu ayuda para llegar lo más lejos posible. Debes hacerla pasar
            con seguridad por cada uno de los bloques. Entre más lejos llegue, más puntos
            obtendrás y participarás para ganar fabulosos premios.</p>

            <ul>
              <li><b><i class="fa fa-mobile" aria-hidden="true" style="font-size: 25px; "></i> Si juegas en Móvil:</b> Toca una parte de la pantalla del móvil y no la dejes de
              presionar. Entre más tiempo la presiones, más larga será la rampa que hará llegar
              a La Manita Amiga al siguiente bloque. Entre menos la presiones, menos larga será la
              rampa.
              <li><b><i class="fa fa-desktop" aria-hidden="true"></i> Si juegas en computadora:</b> Da clic en una parte de la pantalla de la computadora y
              no lo sueltes. Entre más tiempo lo presiones, más larga será la rampa que hará
              llegar a La Manita Amiga al siguiente bloque. Entre menos lo presiones, menos larga
              será la rampa.</li>
              <li>Calcula muy bien. De lo contrario podrías hacer una rampa demasiado larga o
              demasiado corta.</li>
              <li>Cada bloque que pases será recompensado con puntos. Entre más lejos llegue la
              mano amiga, más puntos tendrás.</li>
              <li>Entre más avances aumentará la dificultad de juego. Concéntrate y toma tu
              tiempo.</li>
              <li>Podrás jugar las veces que desees. Si eres uno de los primeros 3 puntajes
              aparecerás en el top 3 de nuestro ranking.</li>
            </ul>

            

            <h2 class="text-center"><b>RESTRICCIONES</b></h2>

            <ul>
              <li>Solo puedes ganar una vez.
                <p><b>Ejemplo:</b> Si ganas uno de los primero tres lugares en la semana 1 y vuelves a ganar en
            la semana 2, el premio solo aplicará en la semana 1. En ese caso, si en la semana 2
            vuelves a ganar uno de los primero tres lugares, la siguiente persona con el puntaje
            más alto después de ti será la ganadora.</p>
              </li>
              <li>Nos reservamos el derecho de ocultar los comentarios que atentan contra el
respeto de otro usuario o de la marca. Dicho juego ha sido realizado con el fin de
entretener y brindar a nuestra comunidad momentos de diversión en esta época
navideña.</li>
            </ul>

            <p><b>No podrán participar en la promoción, o en su defecto ser premiados:</b></p>

            <ul>
              <li>Empleados y Directores del SISTEMA FEDECRÉDITO, cónyuges, ni sus parientes en 1er y 2.° grado de consanguinidad, y 1.° de afinidad.</li>
              <li>Empleados de la Agencia de Publicidad.</li>
              <li>Los clientes que realicen operaciones de colecturías como CAESS, CLARO, ANDA, entre otros.</li>
              <li>Si alguna de las personas antes mencionadas resultare como ganador en cualquier sorteo, este premio será anulado y se procederá a entregar el premio al ganador suplente.</li>
              <li>Socios o clientes que estén en mora. </li>
            </ul>

            </div>

            <button href="javascript:;" class="button-aceptar" disabled="disabled">ACEPTAR</button>

          </div>
        </div>
      </div>

    </div>
    <?php } ?>

    <div class="module-form">

      <div class="no-app hide">
        <div class="dtable">
          <div class="innerd">
            <h2 class="text-center">Girar pantalla para seguir jugando</h2>
          </div>
        </div>
      </div>

      

        


      
      <?php 
      if( isset($_GET["l"]) )
      {
        verificar_sesion();
      }

      

        $user_id = session::get (FB_APP_SECRET.'.id');

        if( $db->HasRecords("SELECT count(*) as partidacreada FROM ".APP_DATA_TABLE_DEFAULT."_scoresxusuario where fbid = '".$user_id."' and open = 1; ") )
        {

          

          $partida=$db->RecordsObject();
          $numpartidas = $partida[0]->partidacreada;

          if($numpartidas==0)
          {

            if($db->Query("INSERT INTO ".APP_DATA_TABLE_DEFAULT."_scoresxusuario (idreg, fbid, scorelevel1, scorelevel2, total, open) VALUES (0, '".$user_id."', 0, 0, 0, 1);")){

              $_SESSION["partidacreada"] = 1;

            }else{

              $_SESSION["partidacreada"] = 0;

            }

          }

          

        } 

      //if( $ac_facebook ){
      //if( (session::get (FB_APP_SECRET.'.id') != "") && (session::get (FB_APP_SECRET.'.id') != undefined) ){

        //$welcomescreen = "hide";
        //$gamescreen = "";

        ?>

        

        <div class="game-container w100h100 hidden <?php //echo $gamescreen;?>">

          <a href="<?php echo URL_BASE_APP; ?>logout" class="btn btn-link closesession">Cerrar sesión</a>
          
          <script>
          // Issue a warning if trying to preview an exported project on disk.
          (function(){
            // Check for running exported on file protocol
            /*if (window.location.protocol.substr(0, 4) === "file")
            {
              alert("Exported games won't work until you upload them. (When running on the file:/// protocol, browsers block many features from working for security reasons.)");
            }*/
          })();
          </script>
          
          <!-- The canvas must be inside a div called c2canvasdiv -->
          <div id="c2canvasdiv">
            <button id="show-score">
              <img src="images/btnhighscores-sheet0-corner.png">
            </button>
            <!-- The canvas the project will render to.  If you change its ID, don't forget to change the
            ID the runtime looks for in the jQuery events above (ready() and cr_sizeCanvas()). -->
            <canvas id="c2canvas" width="720" height="1280">
              <!-- This text is displayed if the visitor's browser does not support HTML5.
              You can change it, but it is a good idea to link to a description of a browser
              and provide some links to download some popular HTML5-compatible browsers. -->
              <h1>Your browser does not appear to support HTML5.  Try upgrading your browser to the latest version.  <a href="http://www.whatbrowser.org">What is a browser?</a>
              <br/><br/><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx">Microsoft Internet Explorer</a><br/>
              <a href="http://www.mozilla.com/firefox/">Mozilla Firefox</a><br/>
              <a href="http://www.google.com/chrome/">Google Chrome</a><br/>
              <a href="http://www.apple.com/safari/download/">Apple Safari</a><br/>
              <a href="http://www.google.com/chromeframe">Google Chrome Frame for Internet Explorer</a><br/></h1>
            </canvas>
            
          </div>
          
          <!-- Pages load faster with scripts at the bottom -->
          
          <!-- Construct 2 exported games require jQuery. -->
          <script src="jquery-2.1.1.min.js"></script>


          
            <!-- The runtime script.  You can rename it, but don't forget to rename the reference here as well.
            This file will have been minified and obfuscated if you enabled "Minify script" during export. -->
          <script src="c2runtime.js?t=<?php echo time(); ?>"></script>

            <script>
            // Size the canvas to fill the browser viewport.
            jQuery(window).resize(function() {
              cr_sizeCanvas(jQuery(window).width(), jQuery(window).height());
            });
            
            // Start the Construct 2 project running on window load.
            jQuery(document).ready(function ()
            {     
              // Create new runtime using the c2canvas
              cr_createRuntime("c2canvas");
            });
            
            // Pause and resume on page becoming visible/invisible
            function onVisibilityChanged() {
              if (document.hidden || document.mozHidden || document.webkitHidden || document.msHidden)
                cr_setSuspended(true);
              else
                cr_setSuspended(false);
            };
            
            document.addEventListener("visibilitychange", onVisibilityChanged, false);
            document.addEventListener("mozvisibilitychange", onVisibilityChanged, false);
            document.addEventListener("webkitvisibilitychange", onVisibilityChanged, false);
            document.addEventListener("msvisibilitychange", onVisibilityChanged, false);
            
            if (navigator.serviceWorker && navigator.serviceWorker.register)
            {
              // Register an empty service worker to trigger web app install banners.
              navigator.serviceWorker.register("sw.js?t=<?php echo time(); ?>", { scope: "./" });
            }
            </script>


          
            
        </div>
        <?php

      //}else{

        //$welcomescreen = "";
        //$gamescreen = "hide";

        ?>
        <div class="gamehome w100h100 <?php echo $welcomescreen;?>">
        
        <div class="dtable">

          <div class="innerd">
            
            <div class="home-logo">
              <!-- img/game/logo_start.png infinite pulse  -->
              <img src="icon-256.png" class="animated margin-bottom-40 hidden">
              <div class="main-logo-index"></div>

              <div class="button-logo-container">
              <?php if( $ac_facebook ){ ?>
              <script>
                // Issue a warning if trying to preview an exported project on disk.
                (function(){

                  $( "#btnTermCondic" ).trigger( "click" );

                });
              </script>
              <a href="javascript:;" class="btn btn-block btn-lg fs14px menusound ga_play_game hidden">
                <img src="img/game/btn_jugar_start.png" class="img-responsive center-block margin-top-30">
              </a>

                
                <a href="<?php echo URL_BASE_APP; ?>logout" class="btn btn-link hidden" style="color: black !important; font-size: 16px; margin: 0 auto; display: block; font-style: none;">Cerrar sesión</a>
                
              
              <?php }else{ ?>
                <h2 class="no-margin hidden">INICIA SESIÓN</h2>
                <h1 class=" text-center " style="width: 100%; margin: 20px 0 0 0; color: #007550; ">¡JUEGA Y GANA!</h1>

                <a  onclick="initTakePicture()" class="btn btn-block btn-lg fs14px btn-fbblue intro-off" style="margin-top: 30px; ">
                  <span aria-hidden="true" class="icomoon-facebook-2"></span> REGÍSTRATE
                </a>
                
              <?php } ?>
              </div>

            </div>

            <div class="clearfix text-center margin-top-20 hidden">
              <a href="?service=module-terminos" class="hidden module-show-basesconcurso btn btn-link  fancybox.ajax" data-fancybox-type="ajax" >Terminos y condiciones</a>
              <?php if( $ac_facebook ){ ?>
              <a href="<?php echo URL_BASE_APP; ?>logout" class="btn btn-link" >Cerrar sesión</a>
              <?php } ?>
            </div>

          </div>

        </div>

      </div>
      <?php

      //}

      ?>
      

      

    </div>




