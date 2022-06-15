<x-app-layout>

                        <script type="text/javascript">
                            alert("No hay ninguna imagen")
                        </script> 

<table>
            <form action="{{route('sesions.store')}}" method="POST">            
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>    @csrf
  
                <div class="flex flex-row mt-2">
                        <div class="bg-blue-200 w-40   mr-4 h-6">Visita :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="fecha" value="{{old('fecha')}}"></div>
                                           @error('fecha')<small>*{{$message}}</small>@enderror
                </div>
                <div class="flex flex-row mt-2">
                        <div class="bg-blue-200 w-40   mr-4 h-6">Cliente :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="visita_id" value="{{old('visita_id')}}"></div>
                                           @error('visita_id')<small>*{{$message}}</small>@enderror
                </div>

                <x-jet-secondary-button>Cancelar</x-jet-secondary-button>
                <x-jet-danger-button type="submit" class="ml-2">Crear cliente</x-jet-danger-button>

            </form>
            </table>




</x-app-layout>