<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax</title>
</head>
<body>
<form id="esequetiene" action="ajax1.php" method="post" enctype="multipart/form-data">
      <input type="hidden" id="producto" name="producto[]">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>

      <div class="mb-3">
        <label for="muestra" class="form-label">Muestra:</label>
        <input type="text" class="form-control" id="muestra" name="muestra" required>
      </div>


      <div>
        <input type="checkbox" id="producto1" name="cualquierCosa[]" value="producto1">
        <label for="producto1">Producto 1</label><br>

        <input type="checkbox" id="producto2" name="cualquierCosa[]" value="producto2">
        <label for="producto2">Producto 2</label><br>

        <input type="checkbox" id="producto3" name="cualquierCosa[]" value="producto3">
        <label for="producto3">Producto 3</label><br>

        <input type="checkbox" id="producto4" name="cualquierCosa[]" value="producto4">
        <label for="producto4">Producto 4</label><br>

        <input type="checkbox" id="producto5" name="cualquierCosa[]" value="producto5">
        <label for="producto5">Producto 5</label><br>


      </div>

      <button type="submit" class="btn btn-primary" id="botonEnviar" name="botonEnviar">Agregar Producto</button>
      <div id="muestra1">
      </div>  

    </form>  

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../jquery/jquery_3_5_1.min.js"></script>

    <script>
$(document).ready(function() {
  $('input[name="cualquierCosa[]"]').change(function(event) {
    event.preventDefault();
    const seleccionados = $('input[name="cualquierCosa[]"]:checked');
    muestra.value = seleccionados.length;
    $('#muestra1').html(seleccionados.length);
  });
});

$(document).ready(function() {
  $('#botonEnviar').click(function(event) {
    event.preventDefault();
    
    const datos = $('#esequetiene').serialize();
    alert(datos);
    $.ajax({
      url: '../Controlador/ajax.php',
      type: 'POST',
      data: datos,
      // dataType: 'json',
      success: function(respuesta) {
        // muestra.value = respuesta.informacion;
        // $('#muestra1').html(respuesta.informacion);
        
        $('#muestra1').html(respuesta);
      }
      
    });
  });
});

</script>

<script>
//   function contarUc(){
//     var i = 0;
//     var j = 0;
//     var contUc = 0;
//     var contAsign = 0;
//         $('input[name^="registrar"]').each(function(){
//         if($(this).prop('checked')){
//             j = 0;
//             $('input[name^="unidadCredito"]').each(function(){
//                 if (j == i){
//                     contUc = contUc + parseInt($(this).val(),10);
//                     contAsign++;
//                 }
//                 j++;
//             });
//         }
//         i++;
//     });
//     //alert(cont.toString());
//     cuentaUc.value    = contUc;
//     cuentaAsign.value = contAsign;
//     $('#spanCuentaUc').html(cuentaUc.value);
//     $('#spanCuentaAsign').html(cuentaAsign.value);
//     if(parseInt(cuentaUc.value) > parseInt(ucDisponibles.value))
//         alert("Est? Seleccionando mas UC de las que puede inscribir. Verifique");
     
// }

</script>
</body>
</html>