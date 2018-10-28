<div class="container app-m">
	<div class="row justify-content-center">
		<div class="col-10">
        	<div class="col-12 row section-senov">
					<p style="margin-right:550px">SENOV</p>

					<button type="submit" class="btn btn-volver"><a href="<?php echo URL_APP?>"><i class="fas fa-undo-alt"></i> Volver</a></button>
        	</div>
			<div class="row border rounded bg-white shadow" style="height: 750px; width: 920px;">
				<div class="col-12 app-p">
					<form class="form" action="" method="post">
                     <?php if(!is_null($respuesta)){
                         echo $respuesta;}?>

                  	<div class="form-row">
                      	<div class="form-group col-md-6">
						    <label for="tipo_documento">Tipo Documento</label><br>
                      	  		<select name="tipo_documento" id="tipo_documento">
                      	      		<?php
                      	     			foreach ($data as $d) {
                      	          		echo '<option value="'.$d->id_tipo_documento.'">'.$d->tipo_documento.'</option>';
                      	      			}
                      	      		?>
                      	  		</select>
					  	</div>

					  	<div class="form-group col-md-6">
					    	<label for="documento">Documento</label>
					    	<input name="dni" type="text" class="form-control" id="documento" value="<?php echo isset($_REQUEST['dni']) ? $_REQUEST['dni'] : '';  ?>" placeholder="Documento..." required autocomplete="off">
					  	</div>
                  	</div>

					  <div class="form-group">
					    <label for="nombre">Nombre</label>
					    <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre..." value="<?php echo isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : '';  ?>" required>
					  </div>

					  <div class="form-group">
					    <label for="apellido">Apellido</label>
					    <input name="apellido" type="text" class="form-control" id="apellido" placeholder="Apellido..." value="<?php echo isset($_REQUEST['apellido']) ? $_REQUEST['apellido'] : '';  ?>" required>
					  </div>
                      <div class="form-group">
					    <label for="email">Email</label>
					    <input name="email" type="email" class="form-control" id="email" placeholder="Email..." value="<?php echo isset($_REQUEST['email']) ? $_REQUEST['email'] : '';  ?>" required>
					  </div>
                      <div class="form-group">
					    <label for="telefono">Télefono</label>
					    <input name="telefono" type="text" class="form-control" id="telefono" placeholder="Telefono..." value="<?php echo isset($_REQUEST['telefono']) ? $_REQUEST['telefono'] : '';  ?>" required>
					  </div>
                      <div class="form-group">
					    <label for="password">Contraseña</label>
					    <input name="password" type="password" class="form-control" id="password" placeholder="Contraseña..." required>
					  </div>
                      <div class="form-group">
					    <label for="password2">Confirmar Contraseña</label>
					    <input name="password2" type="password" class="form-control" id="password2" placeholder="Confirmar contraseña..." required>
					  </div>


					  
					  	<button type="submit" class="btn btn-login col-4">Registrar</button>
					 	<button type="submit" class="btn btn-limpiar" style="float: right;"><a href="<?php echo URL_APP?>/home/registrar">Limpiar datos</a></button>
						
					</form>
				</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Ver mas</button>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header mh">
        <p class="modal-title mt" id="exampleModalLabel">Información Novedad</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -5px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
      	<div class="col divM">Tipo Documento</div>
      		<div class="col divM">cedula de ciudadania</div>
      </div> 
      <hr>
      	<div class="row">
      		<div class="col divM">Documento</div>
      		<div class="col divM">1030659553</div>
      	</div>
      	<hr>
      	<div class="row">
      		<div class="col divM">Nombre</div>
      		<div class="col divM">Jeferson</div>
      	</div>
      	<hr>
      	<div class="row">
      		<div class="col divM">Apellido</div>
      		<div class="col divM">Fuentes</div>
      	</div>
      	<hr>
      	<div class="row">
      		<div class="col divM">Email</div>
      		<div class="col divM">jefer@gmail.com</div>
      	</div>
      	<hr>
      	<div class="row">
      		<div class="col divM">Telefono</div>
      		<div class="col divM">3213062275</div>
      	</div>
      	<hr>
      	<div class="row">
      		<div class="col divM">Codigo Ficha</div>
      		<div class="col divM">1438303</div>
      	</div>
      	<hr>
      	<div class="row">
      		<div class="col divM">Novedad</div>
      		<div class="col divM">aplazamiento</div>
      	</div>
      	<hr>
      	<div class="row">
      		<div class="col divM">Acta Novedad</div>
      		<div class="col divM">acta novedad</div>
      	</div>
      	<hr>
      	<div class="row">
      		<div class="col divM">Fecha Inicio</div>
			<div class="col divM">26 de octubre del 2018</div>
      	</div>
      	<hr>
      	<div class="row">
      		<div class="col divM">Fecha Final</div>
      		<div class="col divM">10 de enero del 2019</div>
      	</div>
      	<hr>
      	<div class="row">
      		<div class="col divM">Estado</div>
      		<div class="col divM">tramite</div>
      	</div>
      </div>
     <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

			</div>
		</div>
	</div>
</div>

<style>
.divM{
	margin-left: 20px;
	padding: -3px;
	font-size: 18px;
}
body{
	background-color: #e5e5e5;
}
.btn-login{
	border: none;
	background: #F57408; 
	color: #fff !important;
}

.btn-login:hover{
	background: #F57408;
	opacity: 0.8;
	transition: 0.5s;
	box-shadow: 1px 1px 5px #000;
}

.btn-volver {
	background: none;
}

.btn-volver a{
	color: #fff;
}

.btn-limpiar{
	border: none;
	background: #333;
}

.btn-limpiar a{
	color: #fff;
	text-decoration: none;
}

.btn-limpiar:hover{
	background: #333;
	opacity: 0.8;
	transition: 0.5s;
	box-shadow: 1px 1px 5px #000;
}

.app-p{
	padding: 5rem;
}
.app-m{
	margin-top: 10%;
}

label{
	font-weight: bold;
}

select{
	width: 300px;
	height: 38px;
	border-bottom: 1px solid #333;
	border-radius: 5px;
}

select:focus{
	border-bottom: 1px solid #333;
}

.form{
	padding-left:  50px;
	padding-right:   50px;
}

.form .form-control{
	border-radius: 5px;
	border-bottom: 1px solid #333;
	transition: 300ms ease; 
}

.form .form-control:focus{
	/*outline:1px solid #333;*/
	border-bottom: 1px solid #F57408;
}
.mt{
	color: #fff;
	font-size: 30px;
	text-shadow: 1px 1px 5px #000;
}
.mh{
	background: rgba(255,175,75,1);
	background: -moz-linear-gradient(top, rgba(255,175,75,1) 30%, rgba(255,159,40,1) 43%, rgba(255,140,0,1) 58%, rgba(255,140,0,1) 64%);
	background: -webkit-gradient(left top, left bottom, color-stop(30%, rgba(255,175,75,1)), color-stop(43%, rgba(255,159,40,1)), color-stop(58%, rgba(255,140,0,1)), color-stop(64%, rgba(255,140,0,1)));
	background: -webkit-linear-gradient(top, rgba(255,175,75,1) 30%, rgba(255,159,40,1) 43%, rgba(255,140,0,1) 58%, rgba(255,140,0,1) 64%);
	background: -o-linear-gradient(top, rgba(255,175,75,1) 30%, rgba(255,159,40,1) 43%, rgba(255,140,0,1) 58%, rgba(255,140,0,1) 64%);
	background: -ms-linear-gradient(top, rgba(255,175,75,1) 30%, rgba(255,159,40,1) 43%, rgba(255,140,0,1) 58%, rgba(255,140,0,1) 64%);
	background: linear-gradient(to bottom, rgba(255,175,75,1) 30%, rgba(255,159,40,1) 43%, rgba(255,140,0,1) 58%, rgba(255,140,0,1) 64%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffaf4b', endColorstr='#ff8c00', GradientType=0 );
}

.section-senov{
	/*background-color: #FF8400;*/
	background: rgba(255,175,75,1);
	background: -moz-linear-gradient(top, rgba(255,175,75,1) 30%, rgba(255,159,40,1) 43%, rgba(255,140,0,1) 58%, rgba(255,140,0,1) 64%);
	background: -webkit-gradient(left top, left bottom, color-stop(30%, rgba(255,175,75,1)), color-stop(43%, rgba(255,159,40,1)), color-stop(58%, rgba(255,140,0,1)), color-stop(64%, rgba(255,140,0,1)));
	background: -webkit-linear-gradient(top, rgba(255,175,75,1) 30%, rgba(255,159,40,1) 43%, rgba(255,140,0,1) 58%, rgba(255,140,0,1) 64%);
	background: -o-linear-gradient(top, rgba(255,175,75,1) 30%, rgba(255,159,40,1) 43%, rgba(255,140,0,1) 58%, rgba(255,140,0,1) 64%);
	background: -ms-linear-gradient(top, rgba(255,175,75,1) 30%, rgba(255,159,40,1) 43%, rgba(255,140,0,1) 58%, rgba(255,140,0,1) 64%);
	background: linear-gradient(to bottom, rgba(255,175,75,1) 30%, rgba(255,159,40,1) 43%, rgba(255,140,0,1) 58%, rgba(255,140,0,1) 64%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffaf4b', endColorstr='#ff8c00', GradientType=0 );
	color: #fff;
	justify-content: center;
	padding: 8px;
	font-size: 30px;
	height: 60px; 
	margin-top: -150px;
	text-shadow: 1px 1px 5px #000;
	}
</style>