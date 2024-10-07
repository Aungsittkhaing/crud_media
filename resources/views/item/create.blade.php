@extends('layouts.master')
@section('title')
    Create Page
@stop
@section('content')
    <div class="w-full max-w-md mx-auto bg-white shadow-lg rounded-lg p-8">
        <form class="max-w-sm mx-auto" action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input type="text" id="name" name="name"
                    class="
                    @error('name')
                        border-red-400
                    @enderror
                    bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    placeholder="Apple, Orange, etc" />
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">
                    Price</label>
                <input type="text"
                    class="
                @error('price')
                    border-red-400
                @enderror
                bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    placeholder="Price" name="price" />
                @error('price')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">
                    Stock</label>
                <input type="text"
                    class="
                @error('stock')
                    border-red-400
                @enderror
                bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    placeholder="Stock" name="stock" />
                @error('stock')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Image</label>
                <input type="file" name="images[]"
                    class="
                    bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    placeholder="Apple, Orange, etc" multiple />
            </div>
            <div class="mb-5">
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Select Category</label>
                <select id="category_id" name="category_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <div class="flex">
                    <label class="inline-flex items-center">
                        <input type="radio" class="
                        form-radio text-blue-500" name="status"
                            value="available">
                        <span class="ml-2">Available</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="

                        form-radio text-blue-500" name="status"
                            value="unavailable">
                        <span class="ml-2">Unavailable</span>
                    </label>
                </div>
                @error('status')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">
                    Description</label>
                <textarea id="description" rows="4"
                    class="
                @error('description')
                    border-red-400
                @enderror
                block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border"
                    placeholder="Write your thoughts here..." name="description"></textarea>
                @error('description')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
@endsection
