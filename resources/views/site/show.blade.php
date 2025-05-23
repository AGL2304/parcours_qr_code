
<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-3xl font-bold mb-4">{{ $site->nom }}</h1>


    <div class="mb-4">
        <h2 class="text-xl font-semibold mb-2">Description</h2>
        <p class="text-gray-700">{{ $site->description ?? 'Aucune description disponible.' }}</p>
    </div>

    <div class="mb-4">
        <h2 class="text-xl font-semibold mb-2">Localisation</h2>
        <p class="text-gray-700">Latitude : {{ $site->latitude }}</p>
        <p class="text-gray-700">Longitude : {{ $site->longitude }}</p>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Image du Site</h2>
        @if ($site->image)
            <img src="{{ asset('storage/' . $site->image) }}" alt="{{ $site->nom }}" class="w-full h-64 object-cover rounded">
        @else
            <p class="text-gray-500">Aucune image disponible.</p>
        @endif
    </div>

    <div class="mt-6 text-right">
        <a href="{{ route('sites.index') }}" class="text-blue-600 hover:underline">← Retour à la liste</a>
    </div>
</div>


</x-app-layout>
