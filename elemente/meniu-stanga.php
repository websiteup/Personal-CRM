 <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
    Tip 2: you can also add an image using data-image tag
 -->
<div class="sidebar" data-image="elemente/style/img/sidebar-5.jpg" data-color="blue">
           
            <div class="sidebar-wrapper">
                <div class="logo">
                    <span class="simple-text">
                        Personal CRM
                    </span>
                </div>
                <ul class="nav">
                    <li class="nav-item <?= ($paginaActiva == 'index') ? 'active':''; ?>">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-chart-pie"></i>
                            <p>Panou de control</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($paginaActiva == 'proiecte') ? 'active':''; ?>">
                        <a class="nav-link" href="proiecte.php">
                            <i class="fas fa-globe"></i>
                            <p>Proiecte</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($paginaActiva == 'proiecte_categorii') ? 'active':''; ?>">
                        <a class="nav-link" href="proiecte_categorii.php">
                            <i class="fas fa-list"></i>
                            <p>Categorii proiecte</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($paginaActiva == 'proiecte_statusuri') ? 'active':''; ?>">
                        <a class="nav-link" href="proiecte_statusuri.php">
                            <i class="fas fa-clipboard-check"></i>
                            <p>Statusuri proiecte</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($paginaActiva == 'taskuri') ? 'active':''; ?>">
                        <a class="nav-link" href="taskuri.php">
                            <i class="fas fa-tasks"></i>
                            <p>Taskuri</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($paginaActiva == 'clienti') ? 'active':''; ?>">
                        <a class="nav-link" href="clienti.php">
                            <i class="fas fa-user-friends"></i>
                            <p>Clienti</p>
                        </a>
                    </li>
                    
                    <li class="nav-item <?= ($paginaActiva == 'note') ? 'active':''; ?>">
                        <a class="nav-link" href="note.php">
                            <i class="fas fa-pencil-alt"></i>
                            <p>Note</p>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="./despre.php">
                            <i class="fas fa-info-circle"></i>
                            <p>Despre proiect</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>