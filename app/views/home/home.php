<div class="container app-m">
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="row border rounded bg-white shadow" style="height: 400px;">
				
				<div class="col-8 app-p">
					<form class="form" action="<?php echo URL_APP;?>/home/login" method="post">
					  <div class="form-group placeholder2">
					    <label for="documento">Documento</label>
					    <div class="input-group-prepend">
          					<div class="input-group-text" style="background: none;  border: none;"><i class="far fa-id-card"></i></div>
					    <input name="dni" type="text" class="form-control" id="documento" value="<?php echo isset($_REQUEST['dni']) ? $_REQUEST['dni'] : '';  ?>" placeholder="Documento..." required autocomplete="off">
        				</div>
					  </div>
					  <br>
					  <div class="form-group">
					    <label for="password">Contraseña</label>
					    <div class="input-group-prepend">
          					<div class="input-group-text" style="background: none; border: none;"><i class="fas fa-key"></i></div>
					    <input name="password" type="password" class="form-control" id="password" placeholder="Contraseña..." required>
        				</div>
					  </div>

					  <?php if (isset($data['error'])): ?>
					  	<div class="alert alert-danger" role="alert">
							<?php echo $data['error']; ?>
						</div>
					  <?php endif ?>
					  
					 <div class="container" style="text-align: center;">
					 	 <button type="submit" class="btn btn-login col-5">Ingresar</button>
					 </div>
						
					</form>
				</div>

				<div class="col-4 section-senov p-2">
					<div class="text-white text-center py-3">
						<h2 style="text-shadow: 1px 1px 5px #000">Senov</h2>
						<hr style="background-color: #fff">
					 	 <button type="submit" class="btn btn-registrarse"><a href="<?php echo URL_APP?>/home/registrar">Registrarse</a></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
body{
	background-color: #e5e5e5;
}
label{
	font-weight: bolder;
	font-size: 20px;
}

.btn-login{
	border: none;
	background: #F57408; 
	color: #fff !important;
	margin-top: 50px;
}

.btn-login:hover{
	background: #F57408;
	opacity: 0.9;
	transition: 0.5s;
	box-shadow: 1px 1px 5px #000;
}

.btn-registrarse{
	border: none;
	background: #333;
	margin-top: 240px;
}

.btn-registrarse a{
	color: #fff;
	text-decoration: none;
}

.btn-registrarse:hover{
	background: #333;
	opacity: 0.9;
	transition: 0.5s;
	box-shadow: 1px 1px 5px #fff;
}

.app-p{
	padding: 5rem;
}
.app-m{
	margin-top: 10%;
}
.form{
	padding-left:  50px;
	padding-right:   50px;
}

.form .form-control{
	border-radius: 0px;
	border: none;
	border-bottom: 1px solid #333;
	transition: 300ms ease; 
}

.form .form-control:focus{
	/*outline:1px solid #333;*/
	border-bottom: 1px solid #F57408;
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
}
</style>