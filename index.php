<?php include_once('view/header/head.php'); ?>



<body>

    <!-- <button id="btnModal" data-bs-toggle="modal" data-bs-target="#myModal">Abrir Modal</button> -->
    <button type="button" id="btnModal" data-bs-toggle="modal" data-bs-target="#myModal" data-bs-whatever="" class="btn btn-primary">Agregar</button>

    <!-- DATATABLE -->
    <div class="container">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Nacimiento</th>
                    <th>Curp</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="modalAlumnos">
                        <div class="row mb-3">
                            <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="apellidoP" class="col-sm-3 col-form-label">Apellido Paterno:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="apellidoP" name="apellidoP">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="apellidoM" class="col-sm-3 col-form-label">Apellido Materno:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="apellidoM" name="apellidoM">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fechaNacimiento" class="col-sm-3 col-form-label">Fecha de Nacimiento:</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="nacimiento" name="nacimiento">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="curp" class="col-sm-3 col-form-label">CURP:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="curp" name="curp">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




</body>

<?php include_once('view/footer/footer.php'); ?>

</html>


<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            "ajax": {
                "url": "sql/datosAlumnos.php",
                "dataSrc": ""
            },
            "columns": [{
                    "data": "Id_alumno"
                },
                {
                    "data": "nombre"
                },
                {
                    "data": "apellidoP"
                },
                {
                    "data": "apellidoM"
                },
                {
                    "data": "nacimiento"
                },
                {
                    "data": "curp"
                },
            ]
        });



        // ENVIO DE DATOS 
        $('#modalAlumnos').submit(function(e) {
            e.preventDefault(); // Evita que se envíe el formulario de forma predeterminada

            var nombre = $('#nombre').val();
            var apellidoP = $('#apellidoP').val();
            var apellidoM = $('#apellidoM').val();
            var nacimiento = $('#nacimiento').val();
            var curp = $('#curp').val();

            
            console.log(nombre);
            console.log(apellidoP);
            console.log(apellidoM);
            console.log(nacimiento);
            console.log(curp);
            // console.log(curp);

            $.ajax({
                url: "sql/insertarAlumnos.php",
                type: "POST",
                dataType: "JSON",
                data: {
                    nombre: nombre,
                    apellidoP: apellidoP,
                    apellidoM: apellidoM,
                    nacimiento: nacimiento,
                    curp: curp
                },
                success: function(response) {
                    alert(response);

                    setTimeout(function() {
                        window.location.reload();
                    }, 3000)
                    $('#myModal').hide(); // Cerrar el modal
                }
            });
        });

    });
</script>