


<div class="db-cent-table db-com-table">
    <div class="db-title">
        <center>
            <h3><img src="images/icon/dbc6.png" />Cuenta</h3>
            <p>Datos de acceso</p>
        </center>
    </div>



	
				<div class="db-profile-edit">
       <form class="s12" method="post" action="?pag=verificar&rhotel=1">
                    <div>
                        <label>Usuario</label>
                        <div class="input-field s12">
                            <input type="text" value="<?php echo $datos['usuario']; ?>" class="validate" name="user">
                            
                        </div>
                    </div>
                       <div>
                           <label>Contraseña</label>
                        <div class="input-field s12">
                            <input type="password" class="validate" name="pass">
                            
                        </div>
                    </div>
                     <div>
                         <label>Nombre de la persona</label>
                        <div class="input-field s12">
                            <input type="text" class="validate" value="<?php echo $datos['nombre']; ?>" name="nombre_p">
                            
                        </div>
                    </div>   
                     <div>
                         <label>Apellido de la persona</label>
                        <div class="input-field s12">
                            <input type="text" class="validate"  value="<?php echo $datos['apellido']; ?>" name="apellido_p">
                            
                        </div>
                    </div>
                     <div>
                           <label>Cedula</label>
                        <div class="input-field s12">
                            <input type="text" class="validate"  value="<?php echo $datos['cedula']; ?>" name="cedula">
                          
                        </div>
                    </div>
                     <div>
                            <label>Genero</label>
                        <div class="input-field s12">
                               <select name="genero" class="validate" >
                                <option value=""></option>
                                <option value="1">Costariccense</option>
                            </select>
                         
                        </div>
                    </div>
                                     
                   <div>
                       <label>Nacionalidad</label>
                        <div class="input-field s12">
                            
                            <select name="nacionalidad" class="validate" >
                                <option value=""></option>
                                <option value="1">Costariccense</option>
                            </select>
                            
                        </div>
                    </div> 
                    
                    <div>
                        <div class="input-field s4"><center>
                            <input type="submit" value="Actualizar" class="waves-effect waves-light log-in-btn"></center> </div>
                    </div>
                </form>
				</div>
