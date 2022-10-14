
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('AÑADIR UNA ALTA O BAJA') }}
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
                            <form method="post" action="{{ route('altasybajas.store') }}">
                                @csrf
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <label for="ticket" class="block font-medium text-sm text-gray-700">TICKET</label>
                                        <input type="text" name="ticket" id="ticket" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('ticket', '') }}" />
                                        @error('ticket')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                     <div class="px-4 py-5 bg-white sm:p-6">
                                        <label for="servername" class="block font-medium text-sm text-gray-700">SERVIDOR</label>
                                        <input type="text" name="servername" id="servername" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('servername', '') }}" />
                                        @error('servername')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <label for="ipaddress" class="block font-medium text-sm text-gray-700">IPADDRESS</label>
                                        <input type="text" name="ipaddress" id="ipaddress" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('ipaddress', '') }}" />
                                        @error('ipaddress')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- FECHA CREATED_AT --}}
                                        {{-- <div class=" justify-center bg-gray-200 py-5">
                                        <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>

                                                <div class="mb-10 w-150">
                                                    <label for="created_format" class="font-bold mb-1 text-gray-700 block">Select Date</label>
                                                    <div class="relative">

                                                        <input type="hidden" name="date" x-ref="date" :value="{{ old('created_format', '') }}"/>
                                                        <input
                                                            type="text"
                                                            readonly
                                                            x-model="datepickerValue"
                                                            @click="showDatepicker = !showDatepicker"
                                                            @keydown.escape="showDatepicker = false"
                                                            class="w-full pl-4 pr-10 py-3 leading-none rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                                            placeholder="Select date" :value="{{ old('created_format', '') }}"/>
                                                            @error('created_format')
                                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                                            @enderror
                                                        <div class="absolute top-0 right-0 px-3 py-2">
                                                            <svg class="h-6 w-6 text-gray-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                            </svg>
                                                        </div>
                                                        <div  class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0" style="width: 17rem" x-show.transition="showDatepicker" @click.away="showDatepicker = false">
                                                            <div class="flex justify-between items-center mb-2">
                                                                <div>
                                                                    <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                                                    <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                                                </div>
                                                                <div>
                                                                    <button
                                                                        type="button"
                                                                        class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                                                                        :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                                                        :disabled="month == 0 ? true : false"
                                                                        @click="month--; getNoOfDays()">
                                                                        <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                                                        </svg>
                                                                    </button>
                                                                    <button
                                                                        type="button"
                                                                        class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                                                                        :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                                                        :disabled="month == 11 ? true : false"
                                                                        @click="month++; getNoOfDays()">
                                                                        <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-wrap mb-3 -mx-1">
                                                                <template x-for="(day, index) in DAYS" :key="index">
                                                                    <div style="width: 14.26%" class="px-1">
                                                                        <div
                                                                            x-text="day"
                                                                            class="text-gray-800 font-medium text-center text-xs">
                                                                        </div>
                                                                    </div>
                                                                </template>
                                                            </div>
                                                            <div class="flex flex-wrap -mx-1">
                                                                <template x-for="blankday in blankdays">
                                                                    <div
                                                                        style="width: 14.28%"
                                                                        class="text-center border p-1 border-transparent text-sm"
                                                                    ></div>
                                                                </template>
                                                                <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                                                    <div style="width: 14.28%" class="px-1 mb-1">
                                                                        <div
                                                                            @click="getDateValue(date)"
                                                                            x-text="date"
                                                                            class="cursor-pointer text-center text-sm rounded-full leading-loose transition ease-in-out duration-100"
                                                                            :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"
                                                                        ></div>
                                                                    </div>
                                                                </template>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        </div>
                                        </div>
                                        <script>
                                            const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                            const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

                                            function app() {
                                                return {
                                                    showDatepicker: false,
                                                    datepickerValue: '',

                                                    month: '',
                                                    year: '',
                                                    no_of_days: [],
                                                    blankdays: [],
                                                    days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

                                                    initDate() {
                                                        let today = new Date();
                                                        this.month = today.getMonth();
                                                        this.year = today.getFullYear();
                                                        this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                                                    },
                                                    isToday(date) {
                                                        const today = new Date();
                                                        const d = new Date(this.year, this.month, date);

                                                        return today.toDateString() === d.toDateString() ? true : false;
                                                    },
                                                    getDateValue(date) {
                                                        let selectedDate = new Date(this.year, this.month, date);
                                                        this.datepickerValue = selectedDate.toDateString();
                                                        this.$refs.date.value = selectedDate.getFullYear() +"-"+ ('0'+ selectedDate.getMonth()).slice(-2) +"-"+ ('0' + selectedDate.getDate()).slice(-2);
                                                        console.log(this.$refs.date.value);

                                                        this.showDatepicker = false;
                                                    },

                                                    getNoOfDays() {
                                                        let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                                                        // find where to start calendar day of week
                                                        let dayOfWeek = new Date(this.year, this.month).getDay();
                                                        let blankdaysArray = [];
                                                        for ( var i=1; i <= dayOfWeek; i++) {
                                                            blankdaysArray.push(i);
                                                        }

                                                        let daysArray = [];
                                                        for ( var i=1; i <= daysInMonth; i++) {
                                                            daysArray.push(i);
                                                        }

                                                        this.blankdays = blankdaysArray;
                                                        this.no_of_days = daysArray;
                                                    }
                                                }
                                            }
                                        </script> --}}
                                    {{-- FECHA CREATED_AT --}}


                                    {{-- STATUS --}}
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                    {{-- RADIOBUTTON ALTAS --}}
                                    <div class="flex items-center mb-4">
                                        <input checked id="status-alta" type="radio" value="{{ old('status', 'ALTA') }}" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="status-alta" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">ALTA</label>
                                    </div>
                                    {{-- RADIOBUTTON BAJAS --}}
                                    <div class="flex items-center">
                                        <input id="status-baja" type="radio" value="{{ old('status', 'BAJA') }}" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="status-baja" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">BAJA</label>
                                    </div>
                                    @error('status')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    </div>
                                    {{-- STATUS --}}


                                    {{-- NAME USUARIO --}}
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <input  name="created_by" id="created_by" type="hidden" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ Auth::user()->email }}"/>
                                        @error('created_by')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    {{-- NAME USUARIO --}}


                                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                            Crear Registro
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

