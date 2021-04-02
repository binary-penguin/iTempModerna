<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
                <div class="sidebar-content">
                    <a class="sidebar-brand" href="<?= URL?>general">
                        <i class="align-middle" data-feather="thermometer"></i>
                        <span class="align-middle" id="main-title">iTemp Moderna</span>
                    </a>

                    <ul class="sidebar-nav">
                        <li class="sidebar-header">Explora</li>

                        <li class="sidebar-item">
                            <a href="#dashboards" data-toggle="collapse" class="sidebar-link"> <i class="align-middle feather-white" data-feather="bar-chart-2"></i> <span class="align-middle s-title">Gráficas</span> </a>
                            <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="<?= URL?>general">
                                        General
                                        <?php $totalN_employees = 0; ?>
                                        <?php foreach ($_SESSION['EMPLOYEES-N'] as $employees_n): ?>
                                        <?php $totalN_employees+= $employees_n ?>
                                        <?php endforeach;?>
                                        <span class="sidebar-badge badge badge-info"><?=$totalN_employees?></span>
                                    </a>
                                </li>


                                <li class="sidebar-item"><a class="sidebar-link" href="por_persona.html">Por persona</a></li>
                            
                                <?php foreach ($_SESSION['LOCATIONS-NAME'] as $location): ?>
                                    <?php $location_index = array_search($location, $_SESSION['LOCATIONS-NAME']); ?>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="<?=URL?>location/load/<?=$location_index?>">
                                            <?=utf8_encode($location)?>
                                            <?php foreach ($_SESSION['EMPLOYEES-N'] as $employees_n): ?>
                                                <?php $employees_index = array_search($employees_n, $_SESSION['EMPLOYEES-N']);?>
                                                
                                                <?php if($location_index == $employees_index):?>
                                                    <span class="sidebar-badge badge badge-primary"><?=$employees_n?></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>     
                                        </a>                 
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="#pages" data-toggle="collapse" class="sidebar-link collapsed"> <i class="align-middle" data-feather="layout"></i> <span class="align-middle s-title">Reportes</span></a>
                            <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="tablas.html">Temperaturas Altas <span class="sidebar-badge badge badge-primary">Hoy</span></a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="tablas.html">Temperaturas Medias <span class="sidebar-badge badge badge-primary">Hoy</span></a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="tablas.html">Temperaturas Bajas <span class="sidebar-badge badge badge-primary">Hoy</span></a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="tablas.html">Temperaturas Altas <span class="sidebar-badge badge badge-primary">Semanal</span></a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="tablas.html">Temperaturas Medias <span class="sidebar-badge badge badge-primary">Semanal</span></a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="tablas.html">Temperaturas Bajas <span class="sidebar-badge badge badge-primary">Semanal</span></a>
                                </li>

                                <li class="sidebar-item"><a class="sidebar-link" href="tablas.html">Personalizado</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
