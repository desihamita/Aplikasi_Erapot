    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-purple">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" onclick="document.querySelector('#form-logout').submit()">
                    <i class="fas fa-sign-out-alt"></i> <span>Keluar</span>
                </a>
                <form action="{{ route('logout')}}" method="post" id="form-logout">@csrf</form>
            </li>
        </ul>
      </nav>
      <!-- /.navbar -->
