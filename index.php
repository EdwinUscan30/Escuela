<?php include_once('view/header/head.php'); ?>



<body>


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


</body>

<?php include_once('view/footer/footer.php'); ?>

</html>


<script type="text/javascript">
    $(document).ready(function(){
        $('#example').DataTable({
            "ajax":{
                "url" : "sql/datosAlumnos.php",
                "dataSrc": ""
            },
            "columns":[
                {"data" : "Id_alumno"},
                {"data" : "nombre"},
                {"data" : "apellidoP"},
                {"data" : "apellidoM"},
                {"data" : "nacimiento"},
                {"data" : "curp"},
            ]
        });
    });



</script>