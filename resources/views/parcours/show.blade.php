
<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-3xl font-bold mb-4">{{ $parcours->nom }}</h1>

        <p class="text-gray-600 mb-4">Créé par : <span class="font-semibold">{{ $parcours->user->name ?? 'Inconnu' }}</span>
        </p>

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Description</h2>
            <p class="text-gray-700">{{ $parcours->description }}</p>
        </div>

        <div>
            <h2 class="text-xl font-semibold mb-2">Sites inclus dans le parcours</h2>

            @if ($parcours->sites->isEmpty())
                <p class="text-gray-500">Aucun site n'est encore associé à ce parcours.</p>
            @else
                <ol class="list-decimal pl-6 space-y-2">
                    @foreach ($parcours->sites as $site)
                        <li>
                            <span class="font-medium">{{ $site->nom }}</span>
                            <span class="text-gray-500">(Ordre : {{ $site->pivot->ordre }})</span>
                        </li>
                    @endforeach
                </ol>
            @endif
        </div>

        <div class="mt-10">
            <h2 class="text-xl font-semibold mb-2">Carte du parcours</h2>
            <div id="map" class="w-full h-96 rounded shadow"></div>
        </div>

        <div class="mt-6 text-right">
            <a href="{{ route('parcours.index') }}" class="text-blue-600 hover:underline">← Retour à la liste</a>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var map = L.map('map').setView([{{ $parcours->sites->first()->latitude ?? 48.8566 }}, {{ $parcours->sites->first()->longitude ?? 2.3522 }}], 6);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);

                @foreach ($parcours->sites as $site)
                    L.marker([{{ $site->latitude }}, {{ $site->longitude }}])
                        .addTo(map)
                        .bindPopup("<strong>{{ $site->nom }}</strong><br>Ordre : {{ $site->pivot->ordre }}");
                @endforeach
                });
        </script>
    @endpush
</x-app-layout>