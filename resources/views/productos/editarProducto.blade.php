
@extends('plantilla')
@section('contenido')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">FORMULARIO DE MODIFICACION</h4>
      </div>
      <div class="card-body">
          <form id="editarRegistroProducto" method="post">
            @csrf
            <input type="hidden" name="id" value="<?php echo $obj->id ?>">
            <input type="hidden" name="pro_imagen" value="<?php echo $obj->pro_imagen ?>">

            <div class="row">

              <div class="col-lg-3">
                <label>SELECCIONAR CATEGORIA</label>
                <div class="form-group">
                  <select name="categoria_id" id="" class="form-control" required>
                    <option></option>

                    <?php foreach ($categorias as $value) {  ?>
                      <option value="<?php echo $value->id; ?>" <?php if($value->id==$obj->categoria_id) echo "selected"; ?>><?php echo $value->cat_nombre; ?></option>
                    <?php } ?>

                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <label>IMAGEN</label>
                <div class="form-group">
                  <input type="file" name="imagen" class="form-control" >
                </div>
              </div>
              <div class="col-lg-6">
                <label>NOMBRE PRODUCTO</label>
                <div class="form-group">
                  <input type="text" name="nombre" class="form-control" value="<?php echo $obj->pro_nombre ?>" required>
                </div>
              </div>

              <div class="col-lg-6">
                <label>DESCRIPCION PRODUCTO</label>
                <div class="form-group">
                  <input type="text" name="descripcion" class="form-control" value="<?php echo $obj->pro_descripcion ?>" required>
                </div>
              </div>
              <div class="col-lg-3">
                <label>STOCK</label>
                <div class="form-group">
                  <input type="text" name="stock" value="<?php echo $obj->pro_stock ?>" onkeypress="return solonumeros(event);" maxlength="8" class="form-control" required>
                </div>
              </div>
              <div class="col-lg-3">
                <label>ITEM</label>
                <div class="form-group">
                  <input type="text" name="item" value="<?php echo $obj->pro_item ?>" maxlength="15" class="form-control" required>
                </div>
              </div>

              <div class="col-lg-12">
                <button type="submit" class="btn btn-primary btn-lg">GUARDAR DATOS</button>
                <a href="" class="btn btn-primary btn-lg">SALIR</a>
              </div>

            </div>
          </form>
      	
      </div>
    </div>
  </div>
  
</div>
<script>
function solonumeros(evt){
  var code = (evt.which) ? evt.which : evt.keyCode;
  if(code==8) { // backspace.
    return true;
  } else if(code>=48 && code<=57) { // is a number.
    return true;
  } else{ // other keys.
    return false;
  }
}

$("#editarRegistroProducto").submit(function(event) {
  event.preventDefault();
  var formData=new FormData($("#editarRegistroProducto")[0]);
  $.ajax({
      url:'<?php echo route('pro.editarRegistroProducto') ?>',
      type:'POST',
      data:formData,
      cache:false,
      processData:false,
      contentType:false,
      success:function(){ 
        Swal.fire(
          'DATOS GUARDADO CON EXITO!',
          '',
          'success'
        )
        window.location='/adminProductos'; 
      }
  });
});
</script>
@endsection