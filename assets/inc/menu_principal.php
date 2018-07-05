 <body>

    <!-- Fixed navbar -->
    <nav class="navbar-inverse navbar-fixed-top">

      <div class="container">
        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo $this->config->base_url();?>index.php/login/logueado">Menu Principal</a></li>
            <li><a href="<?php echo $this->config->base_url();?>index.php/instalacion">Instalacion</a></li>
            <li><a href="<?php echo $this->config->base_url();?>index.php/cliente">Clientes</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuracion <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $this->config->base_url();?>index.php/provincia">Provincias</a></li>
                <li><a href="<?php echo $this->config->base_url();?>index.php/ciudad">Ciudades</a></li>
                <li><a href="<?php echo $this->config->base_url();?>index.php/parroquia">Parroquias</a></li>
                <li><a href="<?php echo $this->config->base_url();?>index.php/zona">Zonas</a></li>
                <li><a href="<?php echo $this->config->base_url();?>index.php/nodo">Nodos</a></li>
                <li><a href="<?php echo $this->config->base_url();?>index.php/usuario">Usuarios</a></li>
                 <li><a href="<?php echo $this->config->base_url();?>index.php/tecnico">Tecnicos</a></li>
                <li><a href="<?php echo $this->config->base_url();?>index.php/login/cerrar_sesion">Cerrar Sesion</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <br>
