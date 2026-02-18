<div class="dashboard-container">
        
        <div class="stats-row">
            <div class="stat-card">
            <h2>Animales Disponibles</h2>
            <p class="stat-number violet">
                {{ $animalesDisponibles }}
            </p>
        </div>

        <div class="stat-card">
            <h2>Solicitudes pendiente</h2>
            <p class="stat-number warning">
                {{ $solicitudesPendientes }}
            </p>
        </div>

        <div class="stat-card">
            <h2>Animales adoptados</h2>
            <p class="stat-number success">
                {{ $animalesAdoptados }}
            </p>
        </div>
     </div>
 </div>
