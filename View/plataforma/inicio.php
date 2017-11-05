		<div class="dashboard">
			<div class="db-left">
				<div class="db-left-1">
					<h4>Jana Novakova</h4>
				</div>
				<div class="db-left-2">
					<ul>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>"><img src="images/icon/db1.png" alt="" /> General</a>
						</li>
                         
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=usuarios"><img src="images/icon/db2.png" alt="" /> Usuarios</a>
						</li>
                        <li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=hoteles"><img src="images/icon/db2.png" alt="" /> Hoteles</a>
						</li>
                        

                        
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=categorias"><img src="images/icon/db2.png" alt="" /> Categorias</a>
						</li>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=tipos"><img src="images/icon/db3.png" alt="" /> Tipos</a>
						</li>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=precios"><img src="images/icon/db4.png" alt="" /> Precios</a>
						</li>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=puntuaciones"><img src="images/icon/db5.png" alt="" /> Puntuaciones</a>
						</li>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=servicios"><img src="images/icon/db7.png" alt="" /> Servicios</a>
						</li>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=habitaciones"><img src="images/icon/db6.png" alt="" /> Habitaciones</a>
						</li>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=salir"><img src="images/icon/db8.png" alt="" /> Logout</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="db-cent" style="padding: 55px;">
			
                <?php if(!isset($_GET['pagina'])){ ?>
                    
                	<div class="db-profile-view">
					<table>
						<thead>
							<tr>
								<th>Age</th>
								<th>Profile Completion</th>
								<th>Join Date</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>32</td>
								<td>90%</td>
								<td>May 2010</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="db-profile-edit">
					<form class="col s12">
						
						<div>
							<label class="col s4">Email id</label>
							<div class="input-field col s8">
								<input type="email" value="jana-novakova@gmail.com" class="validate"> </div>
						</div>

						<div>
							<div class="input-field col s8">
								<input type="submit" value="Submit" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn"> </div>
						</div>
					</form>
				</div>
                
                
                
                <?php  
                    }else{
                        include "html/plataforma/".$_GET['pagina'].".php";    
                    }
                ?>

			</div>
		</div>
	</section>