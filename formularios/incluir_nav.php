    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <!-- <img class="app-sidebar__user-avatar" src="../assets/img/login.png" alt="User Image"> -->
        <?php  
                     if ($imagen =="") { ?>
                       <img src="../assets/img/login-default.png" class="app-sidebar__user-avatar" alt="User Image"/>
                     <?php
                     }
                     else { ?>
                       <img src="../fotos/<?php echo $imagen; ?>"  class="app-sidebar__user-avatar" alt="User Image"/>
                     <?php
                     }
                     ?>
        <div>
          <p class="app-sidebar__user-name">  <?php
                        //---------- USES DE LAS CLASES DE NAMESPACES ----
                        use \clases\ctrl_session\Ctrl_Session;
                        //-----------------------------------------------
                        echo $nombre;
                        ?>
                        </p>
          <p class="app-sidebar__user-designation"><?php echo $apellido; ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fa fa-map"></i><span class="app-menu__label">Inicio</span></a></li>
        
     
        <li><a class="app-menu__item" href="frmperfil.php"><i class="app-menu__icon fa fa-user-circle-o"></i><span class="app-menu__label">Perfil</span></a></li>
     
        <li><a class="app-menu__item" href="frm-password.php"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label">Cambiar Contraseña</span></a></li>

        <li><a class="app-menu__item" href="track.php"><i  class="app-menu__icon fa fa-globe"></i><span class="app-menu__label">Obtener localización</span></a></li>

     <!--    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
          </ul>
        </li> -->

      </ul>
    </aside>