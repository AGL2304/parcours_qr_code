<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-3xl font-bold mb-4">{{ $parcours->nom }}</h1>
        
        <p class="text-gray-600 mb-4">
            Créé par :
            <span class="font-semibold">
                {{ $parcours->user?->name ?? 'Inconnu' }}
            </span>
        </p>
        
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Description</h2>
            <p class="text-gray-700">
                {{ $parcours->description }}
            </p>
        </div>
        
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Sites inclus dans le parcours</h2>
            
            @if ($parcours->sites->isEmpty())
                <p class="text-gray-500">Aucun site n'est encore associé à ce parcours.</p>
            @else
                <ol class="list-decimal pl-6 space-y-2">
                    @foreach ($parcours->sites->sortBy('pivot.ordre') as $site)
                        <li>
                            <span class="font-medium">{{ $site->nom }}</span><br>
                            <span class="text-sm text-gray-500">Ordre : {{ $site->pivot->ordre }}</span><br>
                            <span class="text-sm text-gray-600">{{ $site->description }}</span>
                        </li>
                    @endforeach
                </ol>
            @endif
        </div>

        <!-- Section QR Code améliorée -->
        <div class="mb-6 bg-gray-50 p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-4">QR Code du parcours</h3>
            <div class="flex flex-col md:flex-row items-center gap-6">
                <div class="bg-white p-4 rounded-lg shadow-sm">
                    {!! QrCode::size(200)->generate(route('parcours.public', $parcours)) !!}
                </div>
                <div class="flex-1">
                    <p class="text-gray-600 mb-4">
                        Scannez ce QR code pour partager ce parcours ou l'afficher sur un appareil mobile.
                    </p>
                    <div class="space-y-2">
                        <button 
                            onclick="copyToClipboard('{{ route('parcours.public', $parcours->id) }}')"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-200 mr-2"
                        >
                            📋 Copier le lien
                        </button>
                        <a 
                            href="{{ route('parcours.qrcode.download', $parcours) }}"
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md transition duration-200 inline-block"
                        >
                            📥 Télécharger QR Code
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-10">
            <h2 class="text-xl font-semibold mb-2">Carte du parcours</h2>
            <div id="map" class="w-full h-96 rounded shadow"></div>
        </div>
        
        <div class="mt-6 flex justify-between items-center">
            <a href="{{ route('parcours.index') }}" class="text-blue-600 hover:underline">← Retour à la liste</a>
            <div class="space-x-2">
                <a 
                    href="{{ route('parcours.edit', $parcours) }}" 
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md transition duration-200"
                >
                    ✏️ Modifier
                </a>
                <form class="inline" method="POST" action="{{ route('parcours.destroy', $parcours) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce parcours ?')">
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition duration-200"
                    >
                        🗑️ Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function copyToClipboard(text) {
                navigator.clipboard.writeText(text).then(function() {
                    // Afficher une notification de succès
                    const notification = document.createElement('div');
                    notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-md shadow-lg z-50';
                    notification.textContent = 'Lien copié dans le presse-papiers !';
                    document.body.appendChild(notification);
                    
                    setTimeout(() => {
                        document.body.removeChild(notification);
                    }, 3000);
                }, function(err) {
                    console.error('Erreur lors de la copie : ', err);
                });
            }

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
                        L.marker([{{ $site->latitude }}, {{ $site->longitude }}])
                            .addTo(map)
                            .bindPopup(`<strong>{{ $site->nom }}</strong><br>Ordre : {{ $site->pivot->ordre }}`);
                    @endif
                @endforeach
            });
        </script>
    @endpush
</x-app-layout>