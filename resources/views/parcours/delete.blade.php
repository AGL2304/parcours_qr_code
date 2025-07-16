
<x-app-layout>
    <div class="max-w-md mx-auto p-6 mt-10 bg-white shadow-md rounded-lg text-center">
        <h1 class="text-2xl font-bold mb-4">Supprimer le parcours : {{ $parcours->nom }} ?</h1>
        <p class="mb-6 text-gray-700">Cette action est irréversible. Voulez-vous vraiment supprimer ce parcours ?</p>

        <form action="{{ route('parcours.destroy', $parcours) }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="flex justify-center space-x-4">
                <a href="{{ route('parcours.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</a>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Supprimer</button>
            </div>
        </form>
    </div>
</x-app-layout>
