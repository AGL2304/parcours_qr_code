
<x-app-layout>
    <div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-2xl font-bold mb-6">Ajouter un nouveau site</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sites.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nom du site -->
        <div class="mb-4">
            <label for="nom" class="block text-sm font-medium text-gray-700">Nom du site</label>
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

        <!-- Latitude et Longitude -->
        <div class="flex space-x-4 mb-4">
            <div class="flex-1">
                <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                <input type="text" name="latitude" id="latitude" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       value="{{ old('latitude') }}">
            </div>

            <div class="flex-1">
                <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                <input type="text" name="longitude" id="longitude" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       value="{{ old('longitude') }}">
            </div>
        </div>

        <!-- Image du site -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Image (facultative)</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full">
        </div>

        <!-- Bouton de soumission -->
        <div class="text-right">
            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Ajouter le site
            </button>
        </div>
    </form>
</div>


</x-app-layout>
