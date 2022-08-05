@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'medical-appointment',
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">

                        <form class="col-md-12" action="{{ route('apontamentos.update', $appointment->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row align-items-center">
                                <div class="card-header">
                                    <h5 class="title">Editar Consulta</h5>
                                </div>
                                {{-- <div class="col-4 text-left">
                                    <a href="{{ route('apontamentos.update') }}"
                                        class="btn btn-sm btn-primary">Salvar</a>
                                </div> --}}

                                <div class="col-4 text-left">
                                    <button type="submit" class="btn btn-success">{{ __('Save Changes') }}</button>
                                </div>

                            </div>
                            <div class="card-body">
                                @include('pages.medical-appointment._partials.form')
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
