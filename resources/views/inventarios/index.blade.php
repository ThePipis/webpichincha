
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vista Inventario Windows') }}
        </h2>
    </x-slot>

<div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="mt-1 mb-4">
        <div class="relative max-w-xs">
            <form action="{{ route('inventarios.index') }}" method="GET" class="flex items-center">

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
                <a href="{{ route('inventarios.index') }}" type="submit" class="p-2.5 ml-2 text-xl font-medium text-green2 bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                </a>
            </form>
        </div>
    </div>





    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto relative bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-1 px-2">
                            Server_Name
                        </th>

                        <th scope="col" class="py-1 px-2">
                            IP_Primaria
                        </th>
                        <th scope="col" class="py-1 px-2">
                            Ambiente
                        </th>
                        <th scope="col" class="py-1 px-2">
                            Sistema_Operativo
                        </th>
                        <th scope="col" class="py-1 px-2">
                            Rol
                        </th>
                        <th scope="col" class="py-1 px-2">
                            Funcion
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Ver
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($vinfos as $vinfo)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="py-1 px-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $vinfo->Server_Name}}
                            </th>

                            <td class="py-1 px-2">
                                {{ $vinfo->IP_Primaria}}
                            </td>

                            <td class="py-1 px-2">
                                {{ $vinfo->Ambiente}}
                            </td>
                            <td class="py-1 px-2">
                                {{ $vinfo->Sistema_Operativo}}
                            </td>
                            <td class="py-1 px-2">
                                {{ $vinfo->Rol}}
                            </td>
                            <td class="py-1 px-2">
                                {{ $vinfo->Funcion}}
                            </td>
                            <td class="py-4 px-6">
                                <a href="{{ route('inventarios.show', $vinfo->Server_Name) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">
                                    <svg class="mr-2 ml-1 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                        {{ $vinfos->appends($_GET)->links('pagination::tailwind') }}
            </div>
        </div>
        <div class="block mt-8">
            <a href="{{ route('inventarios.export') }}" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Exportar a Excel</a>
        </div>
    </div>
</div>

</x-app-layout>



