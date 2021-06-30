<div class="container p-4">
    <form action="AddUser" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card text-center">
                    <div class="card-header">
                        <output id="imageUser">
                            <img  src="<?php 
                                if($model != null){
                                    if($model->Image != null){
                                        echo 'data:image/jpeg;base64,'.$model->Image;
                                    } else {
                                        echo URL.RQ.'img/default.png';
                                    }
                                } else {
                                    echo URL.RQ.'img/default.png';
                                }

                            ?>" class="responsive-img"/>
                        </output>
                    </div>
                <div class="card-body">
                    <div class="caption text-center">
                        <label class="btn btn-primary" for="files">Cargar foto</label>
                        <input type="file" accept="image/*" name="file_image" id="files">
                    </div>
                </div>    
                </div>

                    
            </div>
            <div class="col-xs-6 col-md-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registrar usuarios</h3>
                    </div>
                    <div class="panel-body">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <div id="header" class="bg-info">
                                        <h2 class="mb-0 t">
                                            <button class="btn text-light" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Ingresar informacion
                                            </button>
                                        </h2>
                                    </div>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="text" name="nid" id="" placeholder="NID" class="form-control" autofocus="" value="<?php echo $model->NID ?? "" ?>" onkeypress="new User().ClearMessages(this);" autofocus />
                                            <span id="nid" class="text-danger"><?php echo $model2->NID ?? "" ?> </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $model->Name ?? "" ?>" onkeypress="new User().ClearMessages(this);" />
                                            <span id="name" class="text-danger"><?php echo $model2->Name ?? "" ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="lastname" class="form-control" placeholder="Last name" value="<?php echo $model->LastName ?? "" ?>" onkeypress="new User().ClearMessages(this);" />
                                            <span id="lastname" class="text-danger"><?php echo $model2->LastName ?? "" ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php echo $model->Phone ?? "" ?>" onkeypress="new User().ClearMessages(this);" />
                                            <span id="phone" class="text-danger"><?php echo $model2->Phone ?? "" ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="direction" class="form-control" placeholder="Direction" value="<?php echo $model->Direction ?? "" ?>" onkeypress="new User().ClearMessages(this);" />
                                            <span id="direction" class="text-danger"><?php echo $model2->Direction ?? "" ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="user" class="form-control" placeholder="User" value="<?php echo $model->Email ?? "" ?>" onkeypress="new User().ClearMessages(this);" />
                                            <span id="user" class="text-danger"><?php echo $model2->Email ?? "" ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $model->Email ?? "" ?>" onkeypress="new User().ClearMessages(this);" />
                                            <span id="email" class="text-danger"><?php echo $model2->Email ?? "" ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $model->Password ?? "" ?>" onkeypress="new User().ClearMessages(this);" />
                                            <span id="password" class="text-danger"><?php echo $model2->Password ?? "" ?></span>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="role" onchange="new User().ClearMessages(this);" >
                                                <?php 
                                                    if($model2 == null){
                                                        echo "<option>Seleccione un role</option>";
                                                    }
                                                    foreach($model3 as $key => $value){
                                                        echo "<option>".$value["role"]."</option>";
                                                    }
                                                ?>
                                            </select>
                                            <span id="role" class="text-danger"><?php echo $model2->Role ?? "" ?></span> 
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-success">Register</button>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <a href="<?php echo URL?>User/Cancel" class="btn btn-warning text-white">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-danger"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>