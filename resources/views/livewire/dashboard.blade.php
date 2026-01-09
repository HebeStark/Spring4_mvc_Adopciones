<div>
   <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="bg-white shadow rounded-xl p-6 text-center">
            <h2 class="text-gray-700">Animales Disponibles</h2>
            <p class="text-4xl font-extrabold text-violet-7004">{{ $animalesDisponibles }}</p>
        </div>

        <div class="bg-white shadow rounded-xl p-6 text-center">
            <h2 class="text-gray-700">Solicitudes pendiente</h2>
            <p class="text-4xl font-bold text-yellow-600">{{ $solicitudesPendientes }}</p>
        </div>

        <div class="bg-white shadow rounded-xl p-6 text-center">
            <h2 class="text-gray-700">Animales adoptados</h2>
            <p class="text-4xl font-bold text-green-600">{{ $animalesAdoptados }}</p>
        </div>

   </div>
</div>
