<div>
    <button wire:click="increment"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-sm">Increment</button>

    <button wire:click="decrement"
        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-sm">Decrement</button>

    <button wire:click="resetData"
        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-sm">Reset</button>

    <p class="mt-4">Count: {{ $count }}</p>
</div>
