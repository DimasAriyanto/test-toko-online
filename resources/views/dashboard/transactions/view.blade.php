<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            View Transaction
        </h2>
    </x-slot>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <form>
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="customer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer
                            Name</label>
                        <input type="text" name="customer" id="customer"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type product name" disabled value="{{ $transaction->user->name }}">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="product"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                        <input type="text" name="product" id="product"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="$2999" disabled value="{{ $transaction->product->name }}">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price</label>
                        <input type="text" name="price" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="$2999" disabled value="{{ $transaction->product->price }}">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="payment_method"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment Method</label>
                        <input type="text" name="payment_method" id="payment_method"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="$2999" disabled value="{{ $transaction->payment_method }}">
                    </div>
                </div>
                <a href="{{ route('transaction.index') }}">
                    <button type="button"
                        class="py-2.5 px-5 me-2 my-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kembali</button>
                </a>
            </form>
        </div>
    </section>
</x-app-layout>
