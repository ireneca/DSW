<section id="sidebar" class="bg-dark text-white">
		<!--SideBar Title -->
		<div class="text-center font-weight-bold nav-link sidebarTitle">
			<?php echo NOMBRE_SITIO; ?>
		</div>
		<!-- SideBar User info -->
		<div class="text-center nav-link sidebarUser">
			<figure>
				<img class="img rounded-circle" src="<?php echo SERVERURL; ?>/img/avatar.jpg" alt="UserIcon">
				<figcaption><?php echo $_SESSION['usuario']; ?></figcaption>
			</figure>
			<ul class="nav justify-content-center">
				<li class="nav-item">
					<a href="#" class="nav-link text-white"><i class="fas fa-cog"></i></a>
				</li>
				<li class="nav-item">
					<a href="<?php echo SERVERURL; ?>/usuarioControlador/logout" class="nav-link text-white"><i class="fas fa-power-off"></i></a>
				</li>
			</ul>
		</div>
		<!-- SideBar Menu -->
		<ul class="nav flex-column sidebarMenu">
			<li class="nav-item">
				<a href="<?php echo SERVERURL; ?>/pagina/home" class="nav-link text-white">
					<i class="fas fa-home"></i> Inicio
				</a>
			</li>
			<li class="nav-item">
				<a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link text-white">
					<i class="fas fa-users-cog"></i> Administrar
				</a>
				<ul class="collapse list-unstyled bg-secondary" id="pageSubmenu1">
					<li>
						<a href="#" class="nav-link text-white"><i class="fas fa-film"></i></i> Pelicula</a>
					</li>
					<li>
						<a href="#" class="nav-link text-white"><i class="fas fa-trophy"></i> Premios</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="<?php echo SERVERURL; ?>/usuarioControlador/index" class="nav-link text-white">
					<i class="fas fa-users"></i> Usuarios
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link text-white">
					<i class="fas fa-film"></i> Peliculas
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link text-white">
					<i class="fas fa-trophy"></i> Premios
				</a>
			</li>
		</ul>
</section>
