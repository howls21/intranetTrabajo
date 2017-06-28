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
          <div id="left-menu">
              <button id="btAddObra" type="button" class="btn btn-default btn-sm btn-block" onclick="addObra()">Agregar Obra</button>
              <button id="btShowEditObra" type="button" class="btn btn-default btn-sm btn-block" onclick="showEditObra()">Editar Obra</button>
              <button id="btShowUploadObra" type="button" class="btn btn-default btn-sm btn-block" onclick="showUploadObra()">Subir archivos (Obra)</button>
              <button id="btSearchFile" type="button" class="btn btn-default btn-sm btn-block" onclick="searchFile()">Buscar Archivos(Obra)</button>
              <button id="btNewWorker" type="button" class="btn btn-default btn-sm btn-block" onclick="showNewWorker()">Ingresar Trabajador</button>
              <button id="btShowEditWorker" type="button" class="btn btn-default btn-sm btn-block" onclick="showEditWorker()">Editar Trabajador</button>
              <button id="btShowUploadWorker" type="button" class="btn btn-default btn-sm btn-block" onclick="showUploadWorker()">Subir Archivos(Trabajador)</button>
              <button id="btShowSearchFileWorker" type="button" class="btn btn-default btn-sm btn-block" onclick="showSearchFileWorker()">Buscar Archivos(Trabajador)</button>
              <button id="btShowCreateCard" type="button" class="btn btn-default btn-sm btn-block" onclick="showCreateCard()">Crear Tarjeta NFC</button>
              <button id="btShowSearchReg" type="button" class="btn btn-default btn-sm btn-block" onclick="showSearchReg()">Buscar Asistencia</button>
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
