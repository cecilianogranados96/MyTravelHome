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
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=mejorar"><img src="images/icon/db2.png" alt="" />Mejorar Oferta</a>
						</li>
                        <li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=cuenta"><img src="images/icon/db2.png" alt="" /> Cuenta</a>
						</li>
                        
                         <li>
							<a href="?pag=<?php echo $_GET['pag']; ?>&pagina=cuenta"><img src="images/icon/db4.png" alt="" /> Estadisticas</a>
						</li>
						<li>
							<a href="?pag=salir"><img src="images/icon/db8.png" alt="" /> Logout</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="db-cent" style="padding: 55px;">
			
                <?php if(!isset($_GET['pagina'])){ 
                        include "html/agencias/cuenta.php";     
                    }else{
                        include "html/agencias/".$_GET['pagina'].".php";    
                    }
                ?>

			</div>
		</div>
	</section>