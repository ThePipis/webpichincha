
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Altas y Bajas') }}
        </h2>
    </x-slot>

<div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="block mt-1">
        <a href="{{ route('altasybajas.create') }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
            <span class="relative px-5 py-2.5 text-center inline-flex  transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                <svg class="mr-2 ml-1 w-4 h-4" fill="null" stroke="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Nuevo Registro
            </span>
        </a>
    </div>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="mt-1 mb-4">
                <div class="relative max-w-xs">
                    <form action="{{ route('altasybajas.index') }}" method="GET" class="flex items-center">

                        <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" name="s"
                        class="block w-full p-3 pl-10 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Search..." />
                        </div>
                        <a href="{{ route('altasybajas.index') }}" type="submit" class="p-2.5 ml-2 text-xl font-medium text-green2 bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </a>
                    </form>
                </div>
            </div>

            <div class="overflow-x-auto relative bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Ticket
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Servidor
                        </th>
                        <th scope="col" class="py-3 px-6">
                            IPAddress
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Status
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Creado Por
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Ver
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Editar
                        </th>
                        @can('delete-altasybajas')
                        <th scope="col" class="py-3 px-6">
                            Delete
                        </th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($altasybajas as $task)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $task->ticket}}
                            </th>
                            <td class="py-4 px-6">
                                {{ $task->servername}}
                            </td>
                            <td class="py-4 px-6">
                                {{ $task->ipaddress}}
                            </td>
                            <td class="py-4 px-6">
                            @if ($task->status === "ALTA")
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $task->status}}
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    {{ $task->status}}
                                </span>
                            </span>
                            @endif
                            </td>
                            <td class="py-4 px-6">
                                {{ $task->created_by}}
                            </td>
                            <td class="py-4 px-6">
                                <a href="{{ route('altasybajas.show', $task->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">
                                    <svg class="mr-2 ml-1 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </a>
                            </td>
                            <td class="py-4 px-6">
                                <a href="{{ route('altasybajas.edit', $task->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">
                                    <svg class="mr-2 ml-1 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                            </td>
                            @can('delete-altasybajas')
                            <td class="py-4 px-6">
                                <form action="{{ route('altasybajas.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            <button type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2">
                                            <svg class="mr-2 ml-1 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </td>
                            @endcan
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                  {{--     {{$altasybajas->appends('busqueda'=>$busqueda)->links('pagination::tailwind')}} --}}
                  {{$altasybajas->appends($_GET)->links('pagination::tailwind')}}
            </div>

        </div>
        <div class="block mt-8">
            <a href="{{ route('altasybajas.export') }}" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Exportar a Excel</a>
        </div>


        <div class="block mt-8">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"  >Subir Archivo</label>
        <form action="{{ route('altasybajas.import') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <input name="file" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" required>
            <br>


            <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Importar Datos
                </span>
              </button>
        </form>
        </div>
    </div>
</div>

</x-app-layout>



