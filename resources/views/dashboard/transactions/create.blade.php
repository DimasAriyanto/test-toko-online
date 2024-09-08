<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Transaction
        </h2>
    </x-slot>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new transaction</h2>
            <form method="POST" action="{{ route('transaction.store') }}">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="user"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer</label>
                        <select id="user" name="user"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('user') is-invalid @enderror">
                            <option selected="">Select customer</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>

                        @error('user')
                            <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="product"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product</label>
                        <select id="product" name="product"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('product') is-invalid @enderror">
                            <option selected="">Select product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                            @endforeach
                        </select>

                        @error('product')
                            <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="payment"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment Method</label>
                        <select id="payment" name="payment"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('payment') is-invalid @enderror">
                            <option selected="">Select payment method</option>
                            @foreach ($payments as $payment)
                                <option value="{{ $payment->value }}">{{ $payment->value }}</option>
                            @endforeach
                        </select>

                        @error('payment')
                            <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Add transaction
                </button>
            </form>
        </div>
    </section>
</x-app-layout>
