<div>

        <x-jet-button wire:click="$set('open2', true)">
            Nuevo
        </x-jet-button>


<x-jet-dialog-modal wire:model="open2">

        <!-- .................................................................................................................................. -->
        <x-slot  name="title">
                <p class="text-center font-bold">Introducir tratamiento nuevo</p>
        </x-slot>
        <!-- .................................................................................................................................. -->      
        <x-slot name="content">

            <table>
            <form action="{{route('tratamientos.store')}}" method="POST">            
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>    @csrf
                
                
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-32 mr-4 h-6">Cod :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="codtra" wire:model="codtra" value="{{old('codtra')}}"></div>
                                           {codtra2}}
                </div>
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-32 mr-4 h-6">Tratamiento :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="tratamiento" wire:model="tratamiento" value="{{old('tratamiento')}}"></div>
                                           {tratamiento2}}
                </div>
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-32 mr-4 h-6">Descripcion :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="descripcion" wire:model="descripcion" value="{{old('descripcion')}}"></div>
                                           {{$descripcion2}}
                </div>
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-32 mr-4 h-6">Precio :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="pretrat" wire:model="pretrat" value="{{old('pretrat')}}"></div>
                                           {{$pretrat2}}
                </div>


                <x-jet-secondary-button wire:click="$set('open2', false)">Cancelar</x-jet-secondary-button>  

                @if ($this->codtra <> "" && $this->tratamiento <> "" && $this->descripcion <> "" && $this->pretrat <> "" )
                        <x-jet-danger-button type="submit" class="ml-2 mt-6">Grabar</x-jet-danger-button>
                @else
                        <x-jet-danger-button wire:click="crear" class="ml-2 mt-6">Revisar Entrada</x-jet-danger-button>
                @endif



            </form>
            </table>

        </x-slot>      
        <!-- .................................................................................................................................. -->           
        <!-- .................................................................................................................................. -->      
        <x-slot name="footer">
               
        </x-slot>     
        <!-- .................................................................................................................................. --> 

</x-jet-dialog-modal>



</div>

