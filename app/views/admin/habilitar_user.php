<div id="estado_novedad">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header t-card">
                <h5 class="float-left" style="font-size: 28px;" >Usuarios</h5>
                <button data-toggle="modal" data-target="#habilitarModal" class="btn btn-md btn-outline-light float-right">Habilitar Usuario <i class="fas fa-user-plus"></i></button>
            </div>
            <div class="card-body">
                <div class="search-form">
                    <span>Buscar:</span>
                    <input type="text" placeholder="Buscar...">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>Tipo Documento</th>
                                <th>Documento</th>
                                <th>Nombres</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="">

                            <tr v-for="item in arrayUsuarios" :key="item.id">
                                <td v-text="item.tipo_documento"></td>
                                <td v-text="item.documento"></td>
                                <td v-text="item.nombre + ' ' + item.apellido"></td>
                                <td v-text="item.email"></td>
                                <td v-text="item.telefono"></td>
                                <td>
                                    <button title="Editar" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </button>&nbsp;

                                    <button title="Desactivar" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
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

    <!-- Modal -->

    <div class="modal fade" id="habilitarModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header t-card">
                    <h5 class="modal-title" id="exampleModalLongTitle">Habilitar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="input-group p-2">
                            <label>Numero de Documento: &nbsp;</label>
                            <input v-model="docHab" type="text" class="form-control form-control-sm">
                            <br>
                            <div class="p-2">
                                <small class="text-muted"><b>Nota:</b> El documento ingresado tendrá acceso a registrarse (verifique bien la información)</small>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button @click="habilitarUsuarios()" type="button" class="btn btn-primary">Habilitar Usuario</button>
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
			
		},
        docHab: '',
        arrayUsuarios: []
	},
	methods:{
		getUsuarios(){
			var me = this;
			axios.get('/senov_v3/usuario/index')
			.then(function (response) {
				var res = response.data;

				me.arrayUsuarios = res.usuarios;
				// console.log(response);
				
			})
			.catch(function (error) {
				console.error(error);
			});
		},
        habilitarUsuarios(){
            var me = this;
            if (me.docHab.length > 0) {
                swal({
                    title: '¿Esta Seguro?',
                    text: "¡No podrá modificar el documento!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        swal(
                            '¡Habilitado!',
                            'La transacción ha sido un éxito.',
                            'success'
                        )
                    }
                    
                    $('#habilitarModal').modal('toggle');
                    console.log(me.docHab);
                    
                })
            } else {
                swal({
                    position: 'top',
                    type: 'error',
                    title: 'Ingrese un Documento Válido!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
	},
	mounted() {
		this.getUsuarios();
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
</style>