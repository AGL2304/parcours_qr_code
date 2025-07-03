<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $parcours->nom }} - Parcours QR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold mb-2">{{ $parcours->nom }}</h1>
            <p class="text-gray-600">
                Créé par : 
                <span class="font-semibold">{{ $parcours->user?->name ?? 'Inconnu' }}</span>
            </p>
        </div>
        
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Description</h2>
            <p class="text-gray-700 leading-relaxed">
                {{ $parcours->description }}
            </p>
        </div>
        
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Sites du parcours</h2>
            
            @if ($parcours->sites->isEmpty())
                <p class="text-gray-500">Aucun site n'est associé à ce parcours.</p>
            @else
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($parcours->sites->sortBy('pivot.ordre') as $site)
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center mb-2">
                                <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-bold mr-2">
                                    {{ $site->pivot->ordre }}
                                </span>
                                <h3 class="font-medium">{{ $site->nom }}</h3>
                            </div>
                            <p class="text-sm text-gray-600">{{ $site->description }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Carte interactive</h2>
            <div id="map" class="w-full h-96 rounded shadow"></div>
        </div>

        <div class="text-center text-gray-500 text-sm">
            <p>Parcours consulté via QR Code</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @php
                $orderedSites = $parcours->sites->sortBy('pivot.ordre');
                $first = $orderedSites->first();
                $lat = $first?->latitude ?? 48.8566;
                $lng = $first?->longitude ?? 2.3522;
            @endphp
            
            var map = L.map('map').setView([{{ $lat }}, {{ $lng }}], 13);
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);
            
            @foreach ($orderedSites as $site)
                @if ($site->latitude && $site->longitude)
                    var marker{{ $loop->index }} = L.marker([{{ $site->latitude }}, {{ $site->longitude }}])
                        .addTo(map)
                        .bindPopup(`
                            <div class="text-center">
                                <strong>{{ $site->nom }}</strong><br>
                                <span class="text-sm text-gray-600">Étape {{ $site->pivot->ordre }}</span><br>
                                <span class="text-sm">{{ $site->description }}</span>
                            </div>
                        `);
                @endif
            @endforeach

            // Ajuster la vue pour inclure tous les marqueurs
            @if ($orderedSites->where('latitude', '!=', null)->where('longitude', '!=', null)->count() > 1)
                var group = new L.featureGroup([
                    @foreach ($orderedSites as $site)
                        @if ($site->latitude && $site->longitude)
                            marker{{ $loop->index }},
                        @endif
                    @endforeach
                ]);
                map.fitBounds(group.getBounds().pad(0.1));
            @endif
        });
    </script>
</body>
</html>