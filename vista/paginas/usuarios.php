<div class="content-wrapper" style="min-height: 717px;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrar usuarios</h1>
        </div>
      </div>
    </div> <!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card card-info card-outline">
            <div class="card-header">
              <button type="button" class="btn btn-success crear-usuarios" data-toggle="modal" data-target="#modal-crear-usuarios">
                Crear nuevo usuarios
              </button><br>
            </div><br>

            <!-- /.card-header -->

            <div class="card-body">
              <table class="table table-bordered table-striped dt-responsive tablausuarios" width="100%">
                <thead>
                  <tr>
                    <th style="width:10px">#</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php ?>
                  <?php
                  //  echo "<pre>"; print_r($usuarios); echo "</pre>";
                  foreach ($usuarios as $key => $value) {

                    $item = "id_roles";
                    $valor = $value["rol"];
                    $roles = ctrRoles::ctrMostrarRoles($item, $valor);



                  ?>


                    <tr>
                      <td><?php echo ($key + 1) ?></td>
                      <td><?php echo $value["nombres"] ?></td>
                      <td><?php echo $value["usuario"] ?></td>
                      <td><?php echo $roles["nom_rol"] ?></td>
                      <!-- <td><button class="btn btn-info btn-sm">Activo</button></td> -->
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btn-sm btnEditarUsuario" data-toggle="modal" idUsuario=<?php echo $value["id"] ?>
                            data-target="#modal-editar-usuarios">
                            <i class="fas fa-pencil-alt text-white"></i>
                          </button>
                          <button class="btn btn-danger btn-sm eliminarUsuario" idUsuario="<?php echo $value['id']; ?>">
                             <i class="fas fa-trash-alt"></i>
                          </button>
                        </div>
                      </td>
                    </tr>


                  <?php

                  }

                  ?>

                  <!-- Aquí van los registros dinámicos -->
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>

</div>



<!--=====================================
Modal Crear usuarios
======================================-->
<div class="modal modal-default fade" id="modal-crear-usuarios">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="alert alert-success alert-dismissible ">Agregar nuevo usuario</h4>
      </div>
      <form method="POST">

        <div class="form-group has-feedback" bis_skin_checked="1">
          <input type="text" class="form-control" name="nom_usuario" placeholder="nombre">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback" bis_skin_checked="1">
          <input type="text" class="form-control" name="nom_user" placeholder="usuario">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback" bis_skin_checked="1">
          <input type="password" class="form-control" name="pass_user" placeholder="password">
          <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
        </div>



        <div class="form-group has-feedback">
          <label>rol</label>
          <select class="form-control" name="rol_user" required>

            <option value="1">admin</option>
            <option value="2">vendedor</option>

          </select>


        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
          <button type="submit" class="btn btn-primary">guardar</button>
        </div>

        <?php

        $guardarusuarios = new ctrUsuarios();
        $guardarusuarios->ctrGuardarusuarios();


        ?>


      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<!--=====================================
Modal editar usuarios
======================================-->
<div class="modal modal-default fade" id="modal-editar-usuarios">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="alert alert-success alert-dismissible ">Ediatr usuario</h4>
      </div>
      <form method="POST">

        <div class="form-group has-feedback" bis_skin_checked="1">
          <input type="hidden" id ="idPerfilE" name="idPerfilE">
          <input type="text" class="form-control" id="nom_usuariosE"name="nom_usuariosE"placeholder="nombre">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback" bis_skin_checked="1">
          <input type="text" class="form-control" id ="nom_userE"name="nom_userE" placeholder="usuario">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback" bis_skin_checked="1">
          <input type="hidden" id="pass_usserActualE" name="pass_usserActualE">
          <input type="password" class="form-control" id="pass_userE" name="pass_userE" placeholder="password">
          <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
        </div>



        <div class="form-group has-feedback">
          <label>rol</label>
          <select class="form-control" name="rol_userE" required>

            <option value="1">admin</option>
            <option value="2">vendedor</option>

          </select>


        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
          <button type="submit" class="btn btn-primary">Editar</button>
        </div>

        <?php

        $editarusuarios = new ctrUsuarios();
        $editarusuarios->ctrEditarusuarios();


        ?>


      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>