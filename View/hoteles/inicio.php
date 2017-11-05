		<div class="dashboard">
			<div class="db-left">
				<div class="db-left-1">
					<h4>Jana Novakova</h4>
				</div>
				<div class="db-left-2">
					<ul>
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>"> <img src="images/icon/db1.png" alt="" /> Cuenta</a>
						</li>
                         
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=habitaciones"> <img src="images/icon/db2.png" alt="" />Habitaciones</a>
						</li>
                        <li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=reportes"> <img src="images/icon/db2.png" alt="" />Reportes</a>
						</li>
                        
                         
						<li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=salir"> <img src="images/icon/db8.png" alt="" /> Logout</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="db-cent" style="padding: 55px;">
			
                <?php if(!isset($_GET['pagina'])){ 
                        include "html/hoteles/cuenta.php";     
                    }else{
                        include "html/hoteles/".$_GET['pagina'].".php";    
                    }
                ?>

			</div>
		</div>
	</section>