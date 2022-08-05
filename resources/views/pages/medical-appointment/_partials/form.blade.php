<div class="row">
    <label class="col-md-1 col-form-label">{{ __('Nome Paciente') }}</label>
    <div class="col-md-3">
        <div class="form-group">
            <input type="text" name="name" class="form-control" value="{{ $appointment->name ?? old('name') }}"
                placeholder="Nome Paciente" required>
        </div>
        @if ($errors->has('name'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row">
    <label class="col-md-1 col-form-label">{{ __('E-mail') }}</label>
    <div class="col-md-3">
        <div class="form-group">
            <input type="email" id="email" name="email" class="form-control"
                value="{{ $appointment->email ?? old('email') }}" placeholder="E-mail" required>
        </div>
        @if ($errors->has('email'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row">
    <label class="col-md-1 col-form-label">{{ __('Data da Consulta') }}</label>
    <div class="col-md-3">
        <div class="form-group">
            <input type="datetime-local" id="date_appointment"
                value="{{ $appointment->date_appointment ?? old('date_appointment') }}" name="date_appointment"
                class="form-control" required>
        </div>
        @if ($errors->has('date_appointment'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('date_appointment') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row">
    <label class="col-md-1 col-form-label">{{ __('Descrição da Consulta') }}</label>
    <div class="col-md-3">
        <div class="form-group">
            <input type="text" name="description" value="{{ $appointment->description ?? old('description') }}"
                class="form-control" placeholder="Descrição da consulta" required>
        </div>
        @if ($errors->has('description'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
</div>
