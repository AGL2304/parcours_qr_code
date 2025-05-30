<!-- resources/views/parcours/create.blade.php -->
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

            <!-- Sélection dynamique des sites -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-4">Ajouter les sites au parcours (min. 3)</h2>

                <div id="sites-container" class="space-y-3">
                    <!-- Par défaut on ajoute 3 lignes pour commencer -->
                </div>

                <button type="button" onclick="addSiteRow()" class="mt-3 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    + Ajouter un site
                </button>
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

    <!-- Script JS pour ajout dynamique -->
    <script>
        let siteIndex = 0;

        // Fonction pour ajouter une ligne site + ordre
        function addSiteRow(selectedId = '', ordreValue = '') {
            const container = document.getElementById('sites-container');
            const row = document.createElement('div');
            row.classList.add('flex', 'items-center', 'gap-4');

            row.innerHTML = `
                <select name="sites[${siteIndex}][id]" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">-- Choisir un site --</option>
                    @foreach($sites as $site)
                        <option value="{{ $site->id }}" ${selectedId == {{ $site->id }} ? 'selected' : ''}>{{ $site->nom }}</option>
                    @endforeach
                </select>

                <input type="number" name="sites[${siteIndex}][ordre]" min="1" placeholder="Ordre"
                    class="w-24 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required value="${ordreValue}">

                <button type="button" onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800">
                    Supprimer
                </button>
            `;

            container.appendChild(row);
            siteIndex++;
        }

        // Ajout initial de 3 lignes pour respecter la règle min 3
        for(let i = 0; i < 3; i++) {
            addSiteRow();
        }
    </script>
</x-app-layout>
