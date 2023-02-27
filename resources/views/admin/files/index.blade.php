<x-app-layout>
    @section('css')
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @endsection
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Admin > Galeria de imagenes') }}
        </h2>
    </x-slot>

    <div class="px-6 py-12 md-px-0">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="mb-4 font-mono text-3xl font-bold uppercase">Album de imágenes</h1>
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-wrap items-center justify-center gap-12">
                        @foreach ($imagenes as $imagen)
                            <div data-aos="zoom-in"
                                class="max-w-[250px] p-4 shadow-lg rounded-lg flex flex-col justify-center items-center hover:scale-105 transition-all duration-200 ease-in">
                                <img class="w-full rounded-md" src="{{ asset($imagen->url) }}" alt="">

                                <div class="flex items-center justify-between gap-3 mt-4">
                                    <a href="{{ route('admin.file.edit', $imagen->id) }}"
                                        class="p-2 text-white bg-yellow-500 rounded-lg hover:bg-yellow-300">Editar</a>

                                    <form class="delete" action="{{ route('admin.file.destroy', $imagen->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="p-2 text-white bg-red-500 rounded-lg hover:bg-red-300">Eliminar</button>
                                    </form>
                                </div>

                                <div class="w-full mt-4 border border-slate-200"></div>

                                <span class="self-start mt-4 text-sm text-slate-400">Publicado:
                                    {{ $imagen->created_at->diffForHumans() }}</span>

                                <p class="self-start mt-4 text-sm text-slate-400">Publicado por:
                                    {{ $imagen->user->name }}</p>
                            </div>
                        @endforeach
                    </div>

                    {{ $imagenes->links() }}
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            AOS.init({
                once: true,
            });
        </script>

        @if (session('delete') == 'ok')
            <script>
                Swal.fire(
                    'Eliminada!',
                    'La categoria a sido eliminada',
                    'success'
                );
            </script>
        @endif

        <script>
            $('.delete').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })
            });
        </script>
    @endsection
</x-app-layout>
