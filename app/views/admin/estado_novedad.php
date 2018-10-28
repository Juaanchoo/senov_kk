<div id="estado_novedad">

 <div class="container mt-5">
		<div class="card shadow">
			<h5 class="card-header t-card">Novedades</h5>
			<div class="card-body">
				<div class="search-form">
					<span>Buscar:</span>
					<input type="text" placeholder="Buscar...">
				</div>
				<table class="table table-bordered table-striped">
					<thead class="text-center">
						<tr>
							<th>Id</th>
							<th>Documento</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Tipo novedad</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody class="text-center">

						<tr v-for="item in arrayNovedades" :key="item.id">
							<td>#</td>
							<td v-text="item.documento"></td>
							<td v-text="item.nombre"></td>
							<td v-text="item.apellido"></td>
							<td v-text="item.novedad"></td>
							<td> <a href="#" @click="verNovedad(item)">Ver mas</a></td>
						</tr>

					</tbody>
				</table>
			<nav aria-label="...">
				<ul class="pagination">
					<li class="page-item disabled">
						<span class="page-link">Previous</span>
					</li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item active">
						<span class="page-link">
							2
							<span class="sr-only">(current)</span>
						</span>
					</li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item">
						<a class="page-link" href="#">Next</a>
					</li>
				</ul>
			</nav>
			</div>
		</div>
	</div>
  
<!-- Modal ver -->

<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			</div>
			
      <div class="modal-body">
				<div class="col-md-6">
					<label>Nombres:</label>
					<p>{{ novedades.nombre + ' ' + novedades.apellido}}</p>
				</div>
			</div>
			
    </div>
  </div>
</div>


</div>

<script>
var app = new Vue({
	el: '#estado_novedad',
	data: {
		novedades:{
			id_novedad: 0,
			tipo_documento: '',
			documento: '',
			nombre: 'armado esteban',
			apellido: 'quito',
			email: '',
			telefono: '',
			codigo_ficha: '',
			novedad: '',
			acta_novedad: '',
			fecha_inicio: '',
			fecha_final: '',
			estado: '',
		},
		arrayNovedades:[]
	},
	methods:{
		getNovedades(){
			var me = this;
			axios.get('/senov_v3/novedades/index')
			.then(function (response) {
				var res = response.data;

				me.arrayNovedades = res.novedades;
				// console.log(me.arrayNovedades);
				
			})
			.catch(function (error) {
				console.error(error);
			});
		},
		verNovedad(data){
			console.log(data);
			
		}
	},
	mounted() {
		this.getNovedades();
	},
})
</script>


<style>
	.search-form{
		margin: 10px;
		text-align: right;
	}
	.search-form input{
		width: 120px;
	}
	.search-form button{
		border-radius: 0px;
	}

	/* 
		modal
	*/

	.modal-body:not(.two-col) { padding:0px }
	.glyphicon { margin-right:5px; }
	.glyphicon-new-window { margin-left:5px; }
	.modal-body .radio,.modal-body .checkbox {margin-top: 0px;margin-bottom: 0px;}
	.modal-body .list-group {margin-bottom: 0;}
	.margin-bottom-none { margin-bottom: 0; }
	.modal-body .radio label,.modal-body .checkbox label { display:block; }
	.modal-footer {margin-top: 0px;}
	@media screen and (max-width: 325px){
			.btn-close {
					margin-top: 5px;
					width: 100%;
			}
			.btn-results {
					margin-top: 5px;
					width: 100%;
			}
			.btn-vote{
					margin-top: 5px;
					width: 100%;
			}
			
	}
	.modal-footer .btn+.btn {
			margin-left: 0px;
	}
	.progress {
			margin-right: 10px;
	}
</style>