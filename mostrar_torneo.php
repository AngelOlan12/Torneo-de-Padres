<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneo Deportivo Día del Padre</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="torneo.css">
</head>
<body>
    <?php
        // Cargar los archivos JSON de equipos
        $equipo_1a = json_decode(file_get_contents('equipo_1a.json'), true);
        $equipo_1b = json_decode(file_get_contents('equipo_1b.json'), true);
    ?>
    <div class="app-container">
        <header class="app-header">
            <div class="header-top">
                <div class="logo">
                    <span class="logo-icon">🏆</span>
                    <span>Torneo Día del Padre</span>
                </div>
                <div class="header-tabs">
                    <a href="#equipos" class="tab active" id="tab-equipos">
                        <i class="fas fa-users"></i> Equipos
                    </a>
                    <a href="#partidos" class="tab" id="tab-partidos">
                        <i class="fas fa-futbol"></i> Partidos
                    </a>
                </div>
            </div>
            <div class="sport-nav">
                <div class="sport-item active" data-sport="todos">
                    <span class="sport-icon">🏆</span>
                    <span class="sport-name">Todos</span>
                </div>
                <div class="sport-item" data-sport="futbol">
                    <span class="sport-icon">⚽</span>
                    <span class="sport-name">Fútbol</span>
                </div>
                <div class="sport-item" data-sport="basquet">
                    <span class="sport-icon">🏀</span>
                    <span class="sport-name">Básquet</span>
                </div>
                <div class="sport-item" data-sport="voleibol">
                    <span class="sport-icon">🏐</span>
                    <span class="sport-name">Voleibol</span>
                </div>
            </div>
        </header>

        <!-- Sección de Equipos -->
        <section id="equipos-section" class="section-content active-section">
            <div class="app-banner">
                <div class="banner-content">
                    <h1>Equipos Participantes</h1>
                    <p>Torneo Deportivo Día del Padre 2024</p>
                </div>
                <div class="banner-image">
                    <img src="https://cdn-icons-png.flaticon.com/512/2158/2158416.png" alt="Equipos">
                </div>
            </div>

            <main class="app-content">
                <div class="teams-grid">
                    <!-- Equipo 1A - cargado desde JSON -->
                    <div class="team-card" data-sport="futbol" data-grado="1A">
                        <div class="team-header">
                            <h3><?php echo htmlspecialchars($equipo_1a['nombre_equipo']); ?></h3>
                            <span class="team-sport">⚽ Fútbol</span>
                        </div>
                        <div class="team-members">
                            <div class="team-avatars">
                                <?php 
                                $max_avatars = min(5, count($equipo_1a['integrantes']));
                                for ($i = 0; $i < $max_avatars; $i++) { 
                                    $img_num = $i + 30; // Para tener avatares diferentes
                                ?>
                                <img src="https://randomuser.me/api/portraits/men/<?php echo $img_num; ?>.jpg" alt="Miembro">
                                <?php } ?>
                            </div>
                            <button class="team-expand">Ver integrantes <span>▼</span></button>
                        </div>
                        <div class="team-details">
                            <ul class="members-list">
                                <?php foreach ($equipo_1a['integrantes'] as $integrante): ?>
                                <li>
                                    <div class="member-info">
                                        <strong><?php echo htmlspecialchars($integrante['nombre']); ?></strong>
                                        <span>Papá de: <?php echo htmlspecialchars($integrante['hijos'][0]['nombre']); ?></span>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Equipo 1B - cargado desde JSON -->
                    <div class="team-card" data-sport="futbol" data-grado="1B">
                        <div class="team-header">
                            <h3><?php echo htmlspecialchars($equipo_1b['nombre_equipo']); ?></h3>
                            <span class="team-sport">⚽ Fútbol</span>
                        </div>
                        <div class="team-members">
                            <div class="team-avatars">
                                <?php 
                                $max_avatars = min(5, count($equipo_1b['integrantes']));
                                for ($i = 0; $i < $max_avatars; $i++) { 
                                    $img_num = $i + 1; // Para tener avatares diferentes
                                ?>
                                <img src="https://randomuser.me/api/portraits/men/<?php echo $img_num; ?>.jpg" alt="Miembro">
                                <?php } ?>
                            </div>
                            <button class="team-expand">Ver integrantes <span>▼</span></button>
                        </div>
                        <div class="team-details">
                            <ul class="members-list">
                                <?php foreach ($equipo_1b['integrantes'] as $integrante): ?>
                                <li>
                                    <div class="member-info">
                                        <strong><?php echo htmlspecialchars($integrante['nombre']); ?></strong>
                                        <span>Papá de: <?php echo htmlspecialchars($integrante['hijos'][0]['nombre']); ?></span>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
        </section>

        <!-- Nueva sección de Partidos -->
        <section id="partidos-section" class="section-content">
            <div class="app-banner matches-banner">
                <div class="banner-content">
                    <h1>Partidos Programados</h1>
                    <p>Calendario del Torneo Deportivo</p>
                </div>
                <div class="banner-image">
                    <img src="https://cdn-icons-png.flaticon.com/512/2158/2158356.png" alt="Partidos">
                </div>
            </div>

            <main class="app-content">
                <div class="date-selector">
                    <button class="date-btn active" data-date="2024-06-15">15 Jun</button>
                    <button class="date-btn" data-date="2024-06-16">16 Jun</button>
                    <button class="date-btn" data-date="2024-06-22">22 Jun</button>
                    <button class="date-btn" data-date="2024-06-23">23 Jun</button>
                </div>
                
                <div class="matches-container">
                    <!-- Partido 1 - Equipo 1A vs Equipo 1B -->
                    <div class="match-card" data-sport="futbol" data-date="2024-06-15">
                        <div class="match-header">
                            <span class="match-time">9:00 AM</span>
                            <span class="match-discipline">⚽ Fútbol</span>
                        </div>
                        <div class="match-teams">
                            <div class="match-team">
                                <div class="team-logo">
                                    <span class="team-abbr">1A</span>
                                </div>
                                <h3><?php echo htmlspecialchars($equipo_1a['nombre_equipo']); ?></h3>
                            </div>
                            <div class="match-vs">VS</div>
                            <div class="match-team">
                                <div class="team-logo">
                                    <span class="team-abbr">1B</span>
                                </div>
                                <h3><?php echo htmlspecialchars($equipo_1b['nombre_equipo']); ?></h3>
                            </div>
                        </div>
                        <div class="match-footer">
                            <span class="match-venue">Cancha Principal</span>
                            <button class="match-details-btn">Detalles</button>
                        </div>
                    </div>

                    <!-- Partido 2 -->
                    <div class="match-card" data-sport="basquet" data-date="2024-06-15">
                        <div class="match-header">
                            <span class="match-time">10:30 AM</span>
                            <span class="match-discipline">🏀 Básquet</span>
                        </div>
                        <div class="match-teams">
                            <div class="match-team">
                                <div class="team-logo">
                                    <span class="team-abbr">5A</span>
                                </div>
                                <h3>Padres 5to A</h3>
                            </div>
                            <div class="match-vs">VS</div>
                            <div class="match-team">
                                <div class="team-logo">
                                    <span class="team-abbr">6B</span>
                                </div>
                                <h3>Padres 6to B</h3>
                            </div>
                        </div>
                        <div class="match-footer">
                            <span class="match-venue">Cancha de Básquetbol</span>
                            <button class="match-details-btn">Detalles</button>
                        </div>
                    </div>
                    
                    <!-- Partido 3 -->
                    <div class="match-card" data-sport="voleibol" data-date="2024-06-16">
                        <div class="match-header">
                            <span class="match-time">9:00 AM</span>
                            <span class="match-discipline">🏐 Voleibol</span>
                        </div>
                        <div class="match-teams">
                            <div class="match-team">
                                <div class="team-logo">
                                    <span class="team-abbr">1B</span>
                                </div>
                                <h3>Padres 1ro B</h3>
                            </div>
                            <div class="match-vs">VS</div>
                            <div class="match-team">
                                <div class="team-logo">
                                    <span class="team-abbr">2A</span>
                                </div>
                                <h3>Padres 2do A</h3>
                            </div>
                        </div>
                        <div class="match-footer">
                            <span class="match-venue">Cancha de Voleibol</span>
                            <button class="match-details-btn">Detalles</button>
                        </div>
                    </div>
                </div>
            </main>
        </section>

        <footer class="app-footer">
            <p>&copy; 2024 Torneo Día del Padre | Escuela Primaria</p>
        </footer>
    </div>

    <script>
        // Script para cambiar entre secciones
        document.querySelectorAll('.header-tabs .tab').forEach(tab => {
            tab.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Actualizar pestañas activas
                document.querySelectorAll('.header-tabs .tab').forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                
                // Mostrar sección correspondiente
                document.querySelectorAll('.section-content').forEach(section => section.classList.remove('active-section'));
                
                const targetId = tab.getAttribute('href').substring(1) + '-section';
                document.getElementById(targetId).classList.add('active-section');
            });
        });
        
        // Script para expandir detalles del equipo
        document.querySelectorAll('.team-expand').forEach(button => {
            button.addEventListener('click', () => {
                const teamCard = button.closest('.team-card');
                const details = teamCard.querySelector('.team-details');
                
                if (details) {
                    details.classList.toggle('show');
                    button.querySelector('span').textContent = details.classList.contains('show') ? '▲' : '▼';
                }
            });
        });

        // Script para filtrar por deporte
        document.querySelectorAll('.sport-item').forEach(item => {
            item.addEventListener('click', () => {
                // Marcar como activo
                document.querySelectorAll('.sport-item').forEach(i => i.classList.remove('active'));
                item.classList.add('active');
                
                // Filtrar equipos y partidos
                const sport = item.getAttribute('data-sport');
                
                // Filtrar equipos
                const cards = document.querySelectorAll('.team-card');
                cards.forEach(card => {
                    if (sport === 'todos') {
                        card.style.display = 'block';
                    } else if (card.getAttribute('data-sport') === sport) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
                
                // Filtrar partidos
                const matches = document.querySelectorAll('.match-card');
                matches.forEach(match => {
                    if (sport === 'todos') {
                        match.style.display = 'block';
                    } else if (match.getAttribute('data-sport') === sport) {
                        match.style.display = 'block';
                    } else {
                        match.style.display = 'none';
                    }
                });
            });
        });
        
        // Script para filtrar partidos por fecha
        document.querySelectorAll('.date-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                // Marcar como activo
                document.querySelectorAll('.date-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                
                // Filtrar partidos por fecha
                const date = btn.getAttribute('data-date');
                const matches = document.querySelectorAll('.match-card');
                
                matches.forEach(match => {
                    if (match.getAttribute('data-date') === date) {
                        match.style.display = 'block';
                    } else {
                        match.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>
               

