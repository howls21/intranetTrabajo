<div id="container-login">
    <div id="header-container"><h3>Ingreso al sistema</h3></div>
    <div id="form">
        
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Usuario</label>
    <div class="col-sm-12">
        <input type="email" class="form-control" id="user" placeholder="usuario" onkeypress="textValidation()">
    </div>
  </div>
        <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Contraseña</label>
    <div class="col-sm-12">
        <input type="password" class="form-control" id="password" placeholder="Contraseña" maxlength="12" onkeydown="ifEnter()">
    </div>
  </div>
        <div class="form-group">
    <div class=" col-sm-12"  style="margin-top: 5%;">
        <button type="submit" class="btn btn-block btn-info" style="font-weight: bold;" onclick="login()">INGRESAR</button>
    </div>
  </div>
        
    </div>
</div>
</body>
</html>
