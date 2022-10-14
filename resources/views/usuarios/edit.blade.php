
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('usuarios.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Regresar a la lista</a>
            </div>
               <div class="flex flex-col">
               <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            {!! Form::model($user, ['method' => 'PATCH','route' => ['usuarios.update', $user->id]]) !!}
                            <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                    <label for="name" class="block font-medium text-sm text-gray-700">Nombre De Usuario</label>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-input rounded-md shadow-sm mt-1 block w-full')) !!}
                            </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="email" class="block font-medium text-sm text-gray-700">Correo Electrónico</label>
                                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-input rounded-md shadow-sm mt-1 block w-full')) !!}
                            </div>
                            {{--<div class="px-4 py-5 bg-white sm:p-6">
                                <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-input rounded-md shadow-sm mt-1 block w-full')) !!}
                            </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                    <label for="password" class="block font-medium text-sm text-gray-700">Confirm Password</label>
                                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-input rounded-md shadow-sm mt-1 block w-full')) !!}
                            </div> --}}
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="roles" class="block font-medium text-sm text-gray-700">Rol</label>
                                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-multiselect block rounded-md shadow-sm mt-1 block w-full','multiple')) !!}

                            </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="password" class="block font-medium text-sm text-gray-700">Cambio De Contraseña (Opcional)</label>
                                <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                @error('password')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Save Changes
                                </button>
                            </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
               </div>
               <div class="block mt-8">
                <a href="{{ route('usuarios.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Regresar a la lista</a>
            </div>
        </div>
    </div>
</x-app-layout>


