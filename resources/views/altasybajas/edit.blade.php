
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ACTUALIZAR DATOS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('altasybajas.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Regresar a la lista</a>
            </div>
               <div class="flex flex-col">
               <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <form method="post" action="{{ route('altasybajas.update', $altasybaja->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <label for="ticket" class="block font-medium text-sm text-gray-700">Ticket</label>
                                        <input type="text" name="ticket" id="ticket" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                               value="{{ old('ticket', $altasybaja->ticket) }}" />
                                        @error('ticket')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <label for="servername" class="block font-medium text-sm text-gray-700">ServerName</label>
                                        <input type="text" name="servername" id="servername" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                               value="{{ old('servername', $altasybaja->servername) }}" />
                                        @error('servername')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <label for="ipaddress" class="block font-medium text-sm text-gray-700">IPAdsress</label>
                                        <input type="text" name="ipaddress" id="ipaddress" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                               value="{{ old('ipaddress', $altasybaja->ipaddress) }}" />
                                        @error('ipaddress')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                     {{-- STATUS --}}
                                     <div class="px-4 py-5 bg-white sm:p-6">
                                        {{-- RADIOBUTTON ALTAS --}}
                                        <div class="flex items-center mb-4">
                                            <input id="status-alta" type="radio" value="ALTA" {{ old('status',$altasybaja->status) == 'ALTA' ? 'checked' : ''}} name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="status-alta" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">ALTA</label>
                                        </div>
                                        {{-- RADIOBUTTON BAJAS --}}
                                        <div class="flex items-center">
                                            <input id="status-baja" type="radio" value="BAJA" {{ old('status',$altasybaja->status) == 'BAJA' ? 'checked' : '' }} name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="status-baja" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">BAJA</label>
                                        </div>
                                        @error('status')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    {{-- STATUS --}}

                                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                            Guardar Cambios
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               </div>
               <div class="block mt-8">
                <a href="{{ route('altasybajas.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Regresar a la lista</a>
            </div>
        </div>
    </div>

</x-app-layout>

