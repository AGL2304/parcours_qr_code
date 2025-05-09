<!-- index-parcours.blade.php -->
<x-app-layout>
    <div class="max-w-5xl mx-auto p-6 mt-10 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6">Liste des parcours</h1>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($parcours->isEmpty())
            <p class="text-gray-600">Aucun parcours n'a encore été créé.</p>
        @else
            <div class="space-y-6">
                @foreach ($parcours as $item)
                    <div class="border p-4 rounded-md hover:bg-gray-50">
                        <h2 class="text-xl font-semibold text-blue-700">{{ $item->nom }}</h2>
                        <p class="text-sm text-gray-500">Par : {{ $item->user->name ?? 'Inconnu' }}</p>
                        <p class="mt-2 text-gray-700">
                            {{ Str::limit($item->description, 150) }}
                        </p>
                        <div class="mt-3">
                            <a href="{{ route('parcours.show', $item) }}" class="text-blue-600 hover:underline">Voir les détails →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>