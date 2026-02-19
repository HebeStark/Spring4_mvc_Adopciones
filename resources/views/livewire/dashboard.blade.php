<div class="max-w-6xl mx-auto">

    <h1 class="text-3xl font-bold text-gray-800 mb-10">
        Dashboard Administrativo
    </h1>

    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

        <div class="bg-white rounded-2xl shadow-lg p-8 transition hover:shadow-xl">
            <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide">
                Animales Disponibles
            </h2>
            <p class="mt-6 text-4xl font-extrabold text-violet-700">
                {{ $animalesDisponibles }}
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-8 transition hover:shadow-xl">
            <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide">
                Solicitudes Pendientes
            </h2>
            <p class="mt-6 text-4xl font-extrabold text-yellow-600">
                {{ $solicitudesPendientes }}
            </p>
        </div>

  <div class="bg-white rounded-2xl shadow-lg p-8 transition hover:shadow-xl">
            <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide">
                Animales Adoptados
            </h2>
            <p class="mt-6 text-4xl font-extrabold text-green-600">
                {{ $animalesAdoptados }}
            </p>
        </div>

     </div>
 </div>
