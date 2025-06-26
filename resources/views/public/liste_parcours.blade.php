<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des parcours</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Liste des parcours disponibles</h1>

        @if($parcours->count() > 0)
            <div 
                x-data="{
                    initSortable() {
                        new Sortable(this.$refs.list, {
                            animation: 150,
                            ghostClass: 'bg-yellow-100',
                            onEnd: () => {
                                const updated = [];
                                this.$refs.list.querySelectorAll('[data-id]').forEach((el, index) => {
                                    updated.push({ id: parseInt(el.dataset.id), order: index + 1 });
                                });

                                console.log('Nouvel ordre :', updated);

                                // Livewire (décommente si utilisé)
                                // this.$wire.call('updateOrder', updated);
                            }
                        });
                    }
                }"
                x-init="initSortable"
                x-ref="list"
                class="grid md:grid-cols-3 gap-6"
            >
                @foreach($parcours as $parcour)
                    <div 
                        data-id="{{ $parcour->id }}"
                        class="bg-white p-4 rounded shadow cursor-move"
                    >
                        @if($parcour->image)
                            <img src="{{ asset($parcour->image) }}" alt="{{ $parcour->nom }}"
                                class="w-full h-48 object-cover rounded mb-4">
                        @endif

                        <h2 class="text-xl font-semibold mb-2">{{ $parcour->nom ?? 'Sans nom' }}</h2>
                        <p class="text-gray-600 mb-2">{{ $parcour->description ?? 'Pas de description.' }}</p>
                        <a href="#" class="text-blue-600 hover:underline">Voir plus</a>
                    </div>
                @endforeach
            </div>
        @else
            <p>Aucun parcours disponible pour le moment.</p>
        @endif
    </div>

    <div class="mt-12 bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-900">Gestion des parcours</h2>
        <livewire:drag-drop-parcours />
    </div>

    @livewireScripts
</body>

</html>
