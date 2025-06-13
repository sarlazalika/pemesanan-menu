<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Product Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm font-medium text-gray-700">Name:</p>
                            <p class="mt-1 text-lg text-gray-900">{{ $product->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Price:</p>
                            <p class="mt-1 text-lg text-gray-900">Rp{{ number_format($product->price, 2, ',', '.') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Stock:</p>
                            <p class="mt-1 text-lg text-gray-900">{{ $product->stock }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Product Type:</p>
                            <p class="mt-1 text-lg text-gray-900">{{ $product->productType->name ?? 'N/A' }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-sm font-medium text-gray-700">Description:</p>
                            <p class="mt-1 text-lg text-gray-900">{{ $product->description ?? 'N/A' }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-sm font-medium text-gray-700">Image:</p>
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="mt-2 max-w-xs h-auto rounded-lg shadow-md">
                            @else
                                <p class="mt-1 text-gray-900">No image available</p>
                            @endif
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Back to Products
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 