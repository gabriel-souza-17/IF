<aside class="bg-dark text-white vh-100" style="width: 250px;">

    <div class="p-3">

        <!-- Logo -->
        <a href="<?= base_url('/') ?>" class="d-block mb-4">
            <img src="<?= base_url('public/assets/images/logo_bargain2.png') ?>"
                 alt="Bargain"
                 width="130">
        </a>

        <!-- Menu -->
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="bi bi-house-fill"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="bi bi-calendar-week-fill"></i>
                    Agenda
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="bi bi-people-fill"></i>
                    Equipe
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="bi bi-scissors"></i>
                    Serviços
                </a>
            </li>

            <li class="nav-item mt-3">
                <a class="nav-link text-danger" href="<?= base_url('login/logout') ?>">
                    <i class="bi bi-box-arrow-right"></i>
                    Sair
                </a>
            </li>

        </ul>

    </div>

</aside>