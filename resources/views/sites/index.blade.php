<!-- sites/index.blade.php -->
<x-app-layout>
    <div class="max-w-5xl mx-auto p-6 mt-10 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6">Liste des Sites</h1>
      
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif
         
        @if ($sites->isEmpty())
            <p class="text-gray-600">Aucun site n'a encore été enregistré.</p>
        @else
            <div class="space-y-6">
                @foreach ($sites as $site)
                    <div class="border p-4 rounded-md hover:bg-gray-50">
                        <h2 class="text-xl font-semibold text-blue-700">{{ $site->nom }}</h2>
                        <p class="text-sm text-gray-500">{{ $site->description ?? 'Aucune description disponible.' }}</p>
                         
                        <div class="mt-3 flex items-center space-x-4">
                            <p class="text-gray-700">Latitude : {{ $site->latitude }}</p>
                            <p class="text-gray-700">Longitude : {{ $site->longitude }}</p>
                        </div>
                         
                        @if ($site->image)
                            <div class="mt-3">
                                @if (Str::startsWith($site->image, ['http://', 'https://']))
                                    <img src="{{ $site->image }}" alt="{{ $site->nom }}" class="w-full h-48 object-cover rounded">
                                @else
                                    <img src="{{ asset('storage/' . $site->image) }}" alt="{{ $site->nom }}" class="w-full h-48 object-cover rounded">
                                @endif
                            </div>
                        @endif
                         
                        <div class="mt-3">
                            <a href="{{ route('sites.show', ['site' => $site->id]) }}" class="text-blue-600 hover:underline">Voir les détails →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>