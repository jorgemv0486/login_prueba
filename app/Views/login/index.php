<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>

<div class="container-fluid p-5">
    <div class="row ">
        <div class="card col-6">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre">
                </div>
                <div class="mb-3">
                    <label class="form-label">clave</label>
                    <input type="password" class="form-control" id="clave">
                </div>
            </div>
            <div class="card-footer">
               <div class="col-12" style="text-align: center">
                   <a onclick="validar()" class="btn btn-sm btn-primary">
                        ingresar
                   </a>
               </div>
            </div>

        </div>

    </div>

</div>

<?php
var_dump($_SESSION);

?>


<script>


    $(document).ready(function () {


    });

    async function validar() {

        if ($('#nombre').val() == '') {

            Swal.fire({
                title: "Ingrese nombre",
                text: "Y",
                icon: "error"
            });
            return;
        }

        if ($('#clave').val() == '') {

            Swal.fire({
                title: "Ingrese clave",
                text: "Y",
                icon: "error"
            });
            return;
        }

        const {data: result} = await axios.post('login/validar', {
            nombre: $('#nombre').val(),
            clave: $('#clave').val(),
        });

        if(result.message == 'OK'){

            await Swal.fire({
                title: "Logeado exitoso",
                text: "",
                icon: "success"
            });
        }else{

            await Swal.fire({
                title: result.message,
                text: "",
                icon: "error"
            });
        }

    }

</script>
</body>
</html>