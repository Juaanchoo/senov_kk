<div class="container app-m">
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="row border rounded bg-white shadow" style="height: 400px;">
				
				<div class="col-8 app-p">
					<form class="form" action="user/login" method="post">
					  <div class="form-group">
					    <label for="documento">Documento</label>
					    <input name="dni" type="text" class="form-control" id="documento" placeholder="" required>
					  </div>
					  <div class="form-group">
					    <label for="password">Contraseña</label>
					    <input name="password" type="password" class="form-control" id="password" placeholder="" required>
					  </div>
					  <button type="submit" class="btn btn-primary btn-login">Ingresar</button>
					</form>
				</div>

				<div class="col-4 section-senov p-5">
					<div class="text-white text-center py-3">
						<h2 class="">Senov</h2>
						<hr style="background-color: #fff">
						<p>La descripcion se encarga juan :v</p>
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
.btn-login{
	border-radius: 0px;
	border-color: #F57408;
	background: #F57408; 
}
.btn-login:hover{
	border-color: #F57408;
	background: rgba(255,175,75,1);
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