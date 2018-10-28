<style>
body{
    background-color: #F5F5F5;
}
.center-center{
    margin:auto;
    margin-top: 10%;
}

.btn-form{
    border-radius: 0px !important;  
    width: 125px;
    transition: 300ms ease;
    outline: none !important;

    /* font-weight: bold; */
}

.btn-form:hover{
    -webkit-box-shadow: 3px 2px 5px 0px rgba(181,181,181,1);
    -moz-box-shadow: 3px 2px 5px 0px rgba(181,181,181,1);
    box-shadow: 3px 2px 5px 0px rgba(181,181,181,1);
}

.btn-form:active{
    transition: 200ms ease;
    transform: scale(0.8);
}

.title-form{
    color: #000;
    font-size: 54px;
    text-shadow: 3px 2px 5px 0px rgba(181,181,181,1);
    font-family: 'Pacifico', cursive;
    text-shadow: 5px 5px 5px #bdbdbd;

}

.form-control{
    border: none;
    border-bottom: 2px solid #2E8BFA;
    border-radius: 0px !important;
    
}

</style>
<div class="container center-center">


    <div class="row m-3" style="background:#fff; box-shadow: 3px 5px 40px 2px #bdbdbd;">
        <div class="col-xs-12 col-sm-12 col-md-4 p-0">
            <img src="<?php echo URL_APP ?>/img/form/img1.jpg" class="rounded-left img-fluid" alt="">
        </div>

        <div class="col-8 border rounded-right p-5">
            <div class="text-center">
                <span class="title-form">Login</span>
                <hr>
            </div>
            <form action="" method="post" class="mt-2" style="padding-left: 100px; padding-right: 100px; padding-top: 50px;">

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="document">Documento</label>
                        <input type="text" class="form-control" id="document" placeholder="Máximo 15*">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="docType">Tipo Documento</label>
                        <select id="docType" class="form-control">
                            <option selected disabled>Seleccione...</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="text" class="form-control" id="password" placeholder="">
                </div>

                <div class="text-right">
                    <button type="button" class="btn btn-primary btn-form">Ingresar</button>
                </div>
            </form>
        </div>
    </div>


</div>

