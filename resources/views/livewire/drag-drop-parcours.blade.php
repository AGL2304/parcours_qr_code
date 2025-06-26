<div 
    x-data="{
        parcours: @entangle('parcours').defer,
        sortableInstance: null,

        initSortable() {
            this.sortableInstance = new Sortable(this.$refs.list, {
                animation: 150,
                ghostClass: 'bg-yellow-100 opacity-50',
                dragClass: 'bg-blue-100',
                chosenClass: 'bg-green-100',
                onEnd: () => this.updateOrder()
            });
        },

        updateOrder() {
            let updated = [];
            this.$refs.list.querySelectorAll('[data-id]').forEach((el, index) => {
                updated.push({ id: parseInt(el.dataset.id), order: index + 1 });
            });
            this.$wire.call('updateOrder', updated);
        },

        destroySortable() {
            if (this.sortableInstance) this.sortableInstance.destroy();
        }
    }"
    x-init="$nextTick(() => initSortable())"
    x-destroy="destroySortable()"
    class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-lg"
>
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Réorganiser les parcours</h2>

    <div class="mb-4 p-3 bg-blue-50 border border-blue-200 rounded">
        <p class="text-sm text-blue-700">
            <strong>Instructions :</strong> Glissez-déposez pour réorganiser l’ordre des parcours.
        </p>
    </div>

    <ul x-ref="list" class="space-y-3">
        <template x-for="item in parcours" :key="item.id">
            <li 
                :data-id="item.id"
                class="group p-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm cursor-move hover:bg-gray-100 hover:shadow-md transition-all duration-150"
            >
                <div class="flex items-center justify-between">
                    <span class="font-medium text-gray-800" x-text="item.nom"></span>
                    <div class="flex items-center space-x-2">
                        <span class="text-xs text-gray-500 bg-gray-200 px-2 py-1 rounded" x-text="'#' + item.id"></span>
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                        </svg>
                    </div>
                </div>
            </li>
        </template>
    </ul>
</div>
