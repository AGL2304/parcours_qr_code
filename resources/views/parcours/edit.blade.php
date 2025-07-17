<x-app-layout>
    <div class="max-w-3xl mx-auto p-6 mt-10 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6">Modifier le parcours : {{ $parcours->nom }}</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('parcours.update', $parcours) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nom" class="block font-semibold mb-1">Nom du parcours</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom', $parcours->nom) }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block font-semibold mb-1">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300" required>{{ old('description', $parcours->description) }}</textarea>
            </div>

            <!-- Champ sites manquant - vous devriez l'ajouter ici -->
            <div class="mb-4">
                <label class="block font-semibold mb-1">Sites du parcours</label>
                <div id="sites-container">
                    @foreach ($parcours->sites->sortBy('pivot.ordre') as $site)
                        <div class="flex items-center mb-2">
                            <select name="sites[{{ $loop->index }}][id]" class="flex-1 border rounded px-3 py-2 mr-2" required>
                                @foreach ($sites as $s)
                                    <option value="{{ $s->id }}" {{ $s->id == $site->id ? 'selected' : '' }}>
                                        {{ $s->nom }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="number" name="sites[{{ $loop->index }}][ordre]" 
                                   value="{{ $site->pivot->ordre }}" 
                                   placeholder="Ordre" 
                                   class="w-20 border rounded px-3 py-2" 
                                   min="1" required>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('parcours.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Enregistrer</button>
            </div>
        </form>
    </div>
</x-app-layout>