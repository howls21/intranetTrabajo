   <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="<?php echo base_url()?>">Intranet</a>
        </div>
        <div class="navbar-collapse collapse">
        <nav>
            <ul class="nav navbar-nav navbar-right" id="exit-ul">
                <li id="menu"><a onclick="killCookie()" href="#"><span class="glyphicon glyphicon-user" style="font-size: 20px"></span>  Salir</a>
             </li>
          </ul>
        </nav>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
          <div id="left-menu">
              <button id="btAddObra" type="button" class="btn btn-default btn-lg btn-block" onclick="addObra()">Agregar Obra</button>
              <button id="btAddObra" type="button" class="btn btn-primary btn-lg btn-block" onclick="editObra()">Editar Obra</button>
              <button id="btShowUploadObra" type="button" class="btn btn-default btn-lg btn-block" onclick="showUploadObra()">Subir archivos (Obra)</button>
              <button id="btSearchFile" type="button" class="btn btn-default btn-lg btn-block" onclick="searchFile()">Buscar Archivos(Obra)</button>
              <button id="btNewWorker" type="button" class="btn btn-default btn-lg btn-block" onclick="showNewWorker()">Ingresar Trabajador</button>
              <button id="btNewWorker" type="button" class="btn btn-primary btn-lg btn-block" onclick="">Editar Trabajador</button>
              <button id="btShowUploadWorker" type="button" class="btn btn-default btn-lg btn-block" onclick="showUploadWorker()">Subir Archivos(Trabajador)</button>
              <button id="btShowSearchFileWorker" type="button" class="btn btn-default btn-lg btn-block" onclick="showSearchFileWorker()">Buscar Archivos(Trabajador)</button>
              <button id="btShowCreateCard" type="button" class="btn btn-default btn-lg btn-block" onclick="showCreateCard()">Crear Tarjeta NFC</button>
              <button id="btShowSearchReg" type="button" class="btn btn-default btn-lg btn-block" onclick="showSearchReg()">Buscar Asistencia</button>
        </div>
          <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-2 main" id="container">

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
