@extends('dashboard.layouts.main')
 
@section('content')
  <div class="grid grid-cols-12 gap-4">
    <div class="col-span-12 lg:col-span-9 p-4">
      @if (session()->has('success'))
      <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg" role="alert">
         {{ session('success') }}
      </div>
    @endif
      <a href="/dashboard/category/create" class="px-5 py-3 bg-sky-300 rounded-md text-gray-500 hover:bg-sky-400 transition"><i class="fa-solid fa-folder-plus"></i> Tambah category</a>
    </div>
  </div>

  <div class="grid grid-cols-12 gap-4">
    <div class="col-span-12 lg:col-span-9 p-4">
      <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Slug
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)      
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4">
                        {{ $category->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $category->slug }}
                    </td>
                    <td class="px-6 py-4 flex">
                        <div class="text-yellow-500 mr-2">
                          <a href="/dashboard/category/{{ $category->slug }}/edit"><i class="fa-solid fa-pen-to-square"></i> Edit </a>
                        </div>
                        |
                        <div class="text-red-500 ml-2">
                          <form action="/dashboard/category/{{ $category->slug }}" method="POST">
                              @csrf
                              @method('delete')
                              <button class="hover:cursor-pointer" type="submit"><i class="fa-solid fa-trash"></i> Delete</button>
                          </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
 
@endsection 