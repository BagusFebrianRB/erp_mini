<?php

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;

new class extends Component {
    public $code;
    public $name;
    public $category_id;
    public $purchase_price;
    public $selling_price;
    public $stock = 0;
    public $min_stock = 5;

    protected $rules = [
        'code' => 'required|unique:products',
        'name' => 'required',
        'category_id' => 'required|exists:categories,id',
        'purchase_price' => 'required|numeric|min:0',
        'selling_price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'min_stock' => 'required|integer|min:0',
    ];

    public function mount()
    {
        $this->code = $this->generateCode();
    }

    public function generateCode()
    {
        $lastProduct = Product::latest('id')->first();
        $number = $lastProduct ? intval(substr($lastProduct->code, 3)) + 1 : 1;
        return 'PRD' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }

    public function save()
    {
        $this->validate();

        Product::create([
            'code' => $this->code,
            'name' => $this->name,
            'category_id' => $this->category_id,
            'purchase_price' => $this->purchase_price,
            'selling_price' => $this->selling_price,
            'stock' => $this->stock,
            'min_stock' => $this->min_stock,
        ]);

        session()->flash('message', 'Product created successfully.');
        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.product-create', [
            'categories' => Category::all(),
        ]);
    }
};
?>

<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form wire:submit.prevent="save">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Product Code</label>
                                <input wire:model="code" type="text" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 text-gray-700 bg-gray-100 shadow-sm">
                                @error('code')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Product Name</label>
                                <input wire:model="name" type="text"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200">
                                @error('name')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Category</label>
                                <select wire:model="category_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Purchase Price</label>
                                <input wire:model="purchase_price" type="number" step="0.01"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200">
                                @error('purchase_price')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Selling Price</label>
                                <input wire:model="selling_price" type="number" step="0.01"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200">
                                @error('selling_price')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Initial Stock</label>
                                <input wire:model="stock" type="number"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200">
                                @error('stock')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Minimum Stock</label>
                                <input wire:model="min_stock" type="number"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200">
                                @error('min_stock')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-3">
                            <a href="{{ route('products.index') }}"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                Cancel
                            </a>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Save Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
