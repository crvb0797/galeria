@section('css')
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Admin > Carga de imagenes') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="mb-4 font-mono text-3xl font-bold uppercase">Cargar una nueva imagen</h1>
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg flex flex-col justify-center items-center p-6">
                {{-- <form action="{{ route('admin.file.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <div class="mb-3 w-96">
                            <input
                                class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-white bg-clip-padding px-3 py-1 text-sm font-normal text-neutral-700 outline-none transition duration-300 ease-in-out file:-mx-3 file:-my-1.5 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-1.5 file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[margin-inline-end:0.75rem] file:[border-inline-end-width:1px] hover:file:bg-neutral-200 focus:border-primary focus:bg-white focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-primary focus:outline-none dark:bg-transparent dark:text-neutral-200 dark:focus:bg-transparent @error('file') border-red-500 border-2 animate-pulse duration-75 @enderror"
                                id="file" name="file" type="file" accept="image/*" />
                            @error('file')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button
                        class="p-2 mt-5 text-white transition-all duration-200 ease-in-out bg-blue-500 rounded-lg hover:bg-blue-400"
                        type="submit">Cargar imagen</button>
                </form> --}}


                <form action="{{ route('admin.file.store') }}"
                    class="dropzone border-dashed border-4 border-blue-800 w-full rounded flex justify-center items-center"
                    id="my-great-dropzone" method="POST">
                    @csrf
                </form>
                <button id="salvar"
                    class="p-2 mt-5 text-white transition-all duration-200 ease-in-out bg-blue-500 rounded-lg hover:bg-blue-400"
                    type="submit">Cargar imagen</button>
            </div>
        </div>
    </div>

</x-app-layout>

@section('script')
@endsection
