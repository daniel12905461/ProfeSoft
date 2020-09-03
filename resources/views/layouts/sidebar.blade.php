  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-indigo elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="{{ asset('adminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <img src="{{ asset('img/pd.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Profe-Soft</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminLTE/dist/img/user5-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Maricela Delgado</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/Estudiante" class="nav-link {{ (request()->is('Estudiante')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Estudiantes
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="/filiacion" class="nav-link {{ (request()->is('filiacion')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Filiacion de Estudiantes
              </p>
            </a>
					</li> -->
          <li class="nav-item">
            <a href="/Curso" class="nav-link {{ (request()->is('Curso')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Cursos
              </p>
            </a>
					</li>
          <li class="nav-item">
            <a href="/materia" class="nav-link {{ (request()->is('materia')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Materias
              </p>
            </a>
					</li>
          <li class="nav-item">
            <a href="/Evaluacion" class="nav-link {{ (request()->is('Evaluacion')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Evaluaciones
              </p>
            </a>
					</li>
          <li class="nav-item">
            <a href="/Calificaciones" class="nav-link {{ (request()->is('Calificaciones')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Calificaciones
              </p>
            </a>
					</li>
					<!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Control de Asistencia
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Feb</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Abril</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Junio</p>
                </a>
              </li>
            </ul>
					</li> -->
					<!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Evaluacion Cuantitativa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    COMUNIDAD Y SOCIEDAD
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../Lenguaje" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Lenguaje</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Ciencias Sociales</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Artes Plasticas</p>
                    </a>
                  </li>
                </ul>
              </li>
						</ul>
						<ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    CIENCIA Y TECNOLOGÍA
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Matemática</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Técnica</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
						<ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    VIDA TIERRA Y TERRITORIO
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Ciencias Naturales</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
						<ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    COSMOS Y PENSAMIENTO
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Religion</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
