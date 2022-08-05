@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'medical-appointment',
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @include('pages.includes.alerts')
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="card-header">
                                <h5 class="title">Listagem de Consultas</h5>
                            </div>
                            <div class="col-4 text-left">
                                <a href="{{ route('apontamentos.create') }}" class="btn btn-sm btn-primary">Add Consulta</a>
                            </div>
                        </div>
                        <div class="form-control">
                            <div class="card-header">
                                <form action="{{ route('apontamentos.search') }}" class="form form-inline" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" value="{{ $filters['name'] ?? old('name') }}"
                                            placeholder="Buscar Nome" class="form-control">&nbsp;

                                        <input type="text" name="email" value="{{ $filters['email'] ?? old('email') }}"
                                            placeholder="Buscar E-mail" class="form-control">&nbsp;
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <label for="">De: </label>
                                        <input type="datetime-local" id="date_start" class="form-control"
                                            value="{{ $filters['date_start'] ?? old('date_start') }}" name="date_start">
                                        <label for="">Até: </label>
                                        <input type="datetime-local" id="date_end" class="form-control"
                                            value="{{ $filters['date_end'] ?? old('date_end') }}" name="date_end">
                                    </div>

                                    <button type="submit" class="btn btn-primary "><i
                                            class="nc-icon nc-zoom-split"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">E-mail</th>
                                            <th scope="col">Dt Consulta</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                            <tr>
                                                <td>{{ $appointment->name }}</td>
                                                <td>
                                                    <a href="mailto:admin@paper.com">{{ $appointment->email }}</a>
                                                </td>
                                                <td>{{ formatDateAndTime($appointment->date_appointment, 'd/m/Y H:i') }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('apontamentos.edit', $appointment->id) }}"
                                                        class="alert alert-info"><i class="nc-icon nc-ruler-pencil"></i></a>

                                                    <button class="alert alert-danger"
                                                        onclick="deleteConfirmation('{{ $appointment->id }}')">
                                                        <i class="nc-icon nc-simple-remove"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

<script type="text/javascript">
    function deleteConfirmation(id) {
        swal({
            title: "Vai excluir mesmo?",
            text: "Deseja realmente excluir este registro?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Sim, tenho certeza!",
            cancelButtonText: "Ops, vou não!",
            reverseButtons: !0
        }).then(function(e) {

            if (e.value === true) {

                $.ajax({
                    type: 'DELETE',
                    url: `apontamentos/${id}`,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'JSON',
                    success: function(results) {

                        if (results.success === true) {
                            swal("Feito!", results.message, "success");
                            location.reload();
                        } else {
                            swal("Ops!", results.message, "error");
                        }
                    }
                });

            } else {
                iziToast.info({
                    title: 'INFO',
                    message: 'Registro não foi excluído.',
                    icon: '',
                    iconText: '',
                    iconColor: '',
                    iconUrl: null,
                    position: 'topRight', // bottomRight, bottomLeft, topRight,
                });
            }

        }, function(dismiss) {
            return false;
        })
    }
</script>
