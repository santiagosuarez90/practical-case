<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Caso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card mt-5">
                    <div class="card-body">

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-primary btn-sm" href="{{ route('cases') }}"><i class="fa fa-arrow-left"></i> Regresar</a>
                        </div>

{{--                        @session('success')--}}
{{--                            <div class="alert alert-success" role="alert"> {{ $value }} </div>--}}
{{--                        @endsession--}}

                        <form action="{{ route('cases-create') }}" method="POST">
                            @csrf

                            <div class="md-12">
                                <label for="select_client" class="form-label"><strong>Cliente:</strong></label>
                                <select name="select_client" id="select_client" class="form-control">
                                    @foreach ($clients as $client)
                                        <option value="{{$client->id}}">
                                            {{$client->name}} {{$client->last_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="py-12">
                                <label for="select_case_type" class="form-label"><strong>Cliente:</strong></label>
                                <select name="select_case_type" id="select_case_type" class="form-control">
                                    @foreach ($casesType as $caseType)
                                        <option value="{{$caseType->id}}">
                                            {{$caseType->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="md-12">
                                <label for="select_client" class="form-label"><strong>Fecha Inicio:</strong></label>
                                <input id="datepicker" width="276"/>
                                @error('start_date')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="md-12">
                                <label for="inputDetail" class="form-label"><strong>Detail:</strong></label>
                                <textarea class="form-control @error('observation') is-invalid @enderror" style="height:150px" name="txt_observation"
                                    id="txt_observation" placeholder="Observaciones"></textarea>
                                @error('observation')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap5'
    });
</script>
