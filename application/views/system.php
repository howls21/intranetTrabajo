   <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"></button>
            <a class="navbar-brand" href="<?php echo base_url()?>">Intranet ECORIMA</a>
        </div>
        <div class="navbar-collapse collapse">
        <nav>
            <ul class="nav navbar-nav navbar-right" id="exit-ul">
                <li id="menu"><a onclick="killCookie()" ><span class="glyphicon glyphicon-user"></span>  Salir</a>
             </li>
          </ul>
        </nav>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
          <div class="left-menu">
              <ul class="dropmenu">
                <li id="liworker"><a href="#" onclick="activated(1)">Trabajador</a>
                    <ul>
                      <li><a href="#" onclick="showNewWorker()">Crear Trabajador</a></li>
                      <li><a href="#" onclick="showEditWorker()">Editar Trabajador</a></li>
                    </ul>
                </li>
                 <li id="liobra"><a href="#" onclick="activated(2)">Obra</a>
                    <ul>
                      <li><a href="#" onclick="addObra()">Crear Obra</a></li>
                      <li><a href="#" onclick="showEditObra()">Editar Obra</a></li>
                    </ul>
                </li>
                <li id="liupload"><a href="#" onclick="activated(3)">Subir Archivos</a>
                    <ul>
                      <li><a href="#" onclick="showUploadWorker()">Subir Archivos (Trabajador)</a></li>
                      <li><a href="#" onclick="showUploadObra()">Subir Archivos (Obra)</a></li>
                    </ul>
                </li>
                <li id="lidownload"><a href="#" onclick="activated(4)">Buscar Archivos</a>
                    <ul>
                      <li><a href="#" onclick="showSearchFileWorker()">Buscar Archivos (Trabajador)</a></li>
                      <li><a href="#" onclick="searchFile()">Buscar Archivos (Obra)</a></li>
                    </ul>
                </li>
                <li id="licard"><a href="#" onclick="activated(5)">Tarjeta NFC</a>
                    <ul>
                      <li><a href="#" onclick="showCreateCard()">Crear Tarjeta</a></li>
                      <li><a href="#">Editar Tarjeta</a></li>
                    </ul>
                </li>
                <li id="lisearch"><a href="#" onclick="showSearchReg()">Buscar Asistencia</a></li>
              </ul>
        </div>
          <div class="col-sm-9 col-md-9  main" id="container">

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
