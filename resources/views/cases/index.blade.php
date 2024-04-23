<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Casos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card mt-12">

{{--                        @session('success')--}}
{{--                        <div class="alert alert-success" role="alert"> {{ $value }} </div>--}}
{{--                        @endsession--}}

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-success btn-sm" href="{{ route('cases-create') }}"> <i class="fa fa-plus"></i> Nuevo Caso</a>
                        </div>

                        <table class="table table-bordered table-striped mt-4">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Cliente</th>
                                <th>Tipo</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse ($cases as $case)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $case->id }}</td>
                                    <td>
                                        <form action="{{ route('products.destroy',$case->id) }}" method="POST">

                                            <a class="btn btn-info btn-sm" href="{{ route('products.show',$case->id) }}"><i class="fa-solid fa-list"></i> Show</a>

                                            <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$case->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="content-center text-center">No hay registros</td>
                                </tr>
                            @endforelse
                            </tbody>

                        </table>

                        {!! $cases->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
