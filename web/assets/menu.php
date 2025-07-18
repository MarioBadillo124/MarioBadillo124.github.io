<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.html");
    exit();
}

// Evitar que el navegador guarde en caché la página
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos_barra_menu.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <title>Document</title>
</head>
<body>

    <header>
        <div class="superior">
            <div class="search">
                <br><h1>Deteccion de agreciones fisicas</h1><br>
            </div>
        </div>

        <div class="container__menu">
            <nav>
                <ul>
                    <li><a href="" id="selected"></a></li>
                    <li><a href="live-view.php" >Vista en tiempo real</a></li>
                    <li><a href="incidents.php" >Historico de incidentes</a></li>
                    <li><a href="statistics.php" >Estadisticas</a></li>
                    <li><a href="admin.php" >Administracion</a></li>
                    <li><a href="ayuda.php" >Ayuda</a></li>
                    <li><a href="db/logout.php">Cerrar sesión</a></li>

                </ul>
            </nav>
        </div>
    </header><br>

            <div class="content">
                <!-- Alertas Recientes -->
                <div class="card recent-alerts">
                    <div class="card-header">
                        <h2>Alertas Recientes</h2>
                        <a href="incidents.php" class="view-all">Ver Todas</a>
                    </div>
                    <div class="card-body">
                        <div class="alert-item critical">
                            <div class="alert-icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="alert-content">
                                <h3>Agresión Física Detectada</h3>
                                <p>Patio Principal - Hace 15 minutos</p>
                            </div>

                        </div>
                        
                        <div class="alert-item warning">
                            <div class="alert-icon">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div class="alert-content">
                                <h3>Posible Conflicto</h3>
                                <p>Cancha de Fútbol - Hace 1 hora</p>
                            </div>

                        </div>
                        
                        <div class="alert-item info">
                            <div class="alert-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div class="alert-content">
                                <h3>Actividad Sospechosa</h3>
                                <p>Entrada Principal - Hoy, 10:15 AM</p>
                            </div>

                        </div>
                    </div>
                </div>
                
                <!-- Resumen de Incidentes -->
                <div class="stats-row">
                    <div class="stat-card total">
                        <div class="stat-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="stat-info">
                            <h3>Total Incidentes</h3>
                            <p>24</p>
                        </div>
                    </div>
                    
                    <div class="stat-card resolved">
                        <div class="stat-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-info">
                            <h3>Resueltos</h3>
                            <p>18</p>
                        </div>
                    </div>
                    
                    <div class="stat-card pending">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-info">
                            <h3>Pendientes</h3>
                            <p>6</p>
                        </div>
                    </div>
                    
                    <div class="stat-card cameras">
                        <div class="stat-icon">
                            <i class="fas fa-video"></i>
                        </div>
                        <div class="stat-info">
                            <h3>Cámaras Activas</h3>
                            <p>4/4</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tus scripts si tienes más -->
    <script>
        // Si se navega hacia atrás, forzar recarga de la página
        window.addEventListener("pageshow", function (event) {
            if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
                // Esta página fue mostrada desde la caché (por botón atrás)
                window.location.reload(); // Fuerza recarga para que el PHP redirija si no hay sesión
            }
        });
    </script>


</body>
</html>