<!-- create-parcours.blade.php -->
<x-app-layout>
    <div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-2xl font-bold mb-6">Créer un nouveau parcours</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('parcours.store') }}" method="POST">
            @csrf

            <!-- Nom du parcours -->
            <div class="mb-4">
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom du parcours</label>
                <input type="text" name="nom" id="nom" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       value="{{ old('nom') }}">
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
            </div>

            <!-- Sélection des sites -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">Points d'intérêt à inclure</h2>

                @forelse($sites as $index => $site)
                    <div class="mb-3 p-3 border rounded-md bg-gray-50">
                        <label class="block mb-1">
                            <input type="checkbox" name="sites[{{ $index }}][id]" value="{{ $site->id }}"
                                   class="mr-2">
                            {{ $site->nom }}
                        </label>
                        <label class="block text-sm text-gray-600">
                            Ordre dans le parcours :
                            <input type="number" name="sites[{{ $index }}][ordre]"
                                   class="ml-2 w-20 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </label>
                    </div>
                @empty
                    <p class="text-gray-500">Aucun site disponible pour l'instant.</p>
                @endforelse
            </div>

            <!-- Bouton de soumission -->
            <div class="text-right">
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Créer le parcours
                </button>
            </div>
        </form>
    </div>
</x-app-layout>