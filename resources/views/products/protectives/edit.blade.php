@extends('layouts.app')

@section('subheader')
    <x-layout.subheader :description="$description" />
@stop

@section('toolbar')
        <a href="{{ route('protectives.show', $protective) }}" class="btn btn-light btn-sm mx-1">@include('svg.back', ['class' => 'navi-icon']) {{ __('Cancel') }}</a>
        @can('update', $protective)
            <a onclick='document.getElementById("protective_update_form").submit();' class="btn btn-light-primary btn-sm mx-1">@include('svg.save', ['class' => 'navi-icon']) {{ __('Save') }}</a>
        @endcan
@stop

@section('content')
<div class="container">
    @if(count($errors) > 0)
    <div class="alert alert-custom alert-notice alert-light-danger fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">
            @foreach($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    </div>
    @endif
    <div class="card card-custom gutter-bs">
        <div class="card-header card-header-tabs-line">
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
                    <li class="nav-item mr-3">
                        <a class="nav-link active" data-toggle="tab" href="#info" role="tab">
                            <span class="nav-icon mr-2">
                                @include('svg.protective', ['class' => 'mr-3'])
                            </span>
                            <span class="nav-text font-weight-bold">Szczegóły</span>
                        </a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#files" role="tab">
                            <span class="nav-icon mr-2">
                                @include('svg.file', ['class' => 'mr-3'])
                            </span>
                            <span class="nav-text font-weight-bold">Dokumenty</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body px-0">
        {!! Form::open(['route' => ['protectives.update', $protective->id], 'method' => 'PUT', 'id' => 'protective_update_form']) !!}
        {!! Form::token() !!}
        <div class="tab-content">
            <div class="tab-pane active px-7" id="info" role="tabpanel">
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <div class="row">
							<label class="col-3"></label>
							<div class="col-9">
								<h6 class="text-dark font-weight-bold mb-10">Dane produktu:</h6>
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Nazwa produktu:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $protective->name }}" name="name" id="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Kod produktu:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="number" value="{{ $protective->code }}" name="code" id="code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Kod OWU:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $protective->code_owu }}" name="code_owu" id="code_owu">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Subskrypcja:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="number" value="{{ $protective->subscription }}" name="subscription" id="subscription">
                            </div>
                        </div>
                        <div class="separator separator-dashed my-10"></div>
                        <div class="row">
							<label class="col-3"></label>
							<div class="col-9">
								<h6 class="text-dark font-weight-bold mb-10">Dane dystrybutora:</h6>
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Nazwa dystrybutora:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $protective->dist }}" name="dist" id="dist">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Kod dystrybutora:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $protective->dist_short }}" name="dist_short" id="dist_short">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane px-7" id="files" role="tabpanel">
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
                            <div class="alert-text">
                                <b>Wskazówka!</b><br>
                                Podczas edycji ubezpieczenia uzupełniasz podstawowe informację na temat kompletu dokumentów.<br>
                                Aby dodać nowy dokument przejdź do zakładki <a href="{{ route('files.create') }}" 
                                @cannot('create', App\Models\File::class)
                                     data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="<b>Uwaga!</b> Nie posiadasz uprawnienia do dodawania dokumentów!"
                                @endcannot
                                ><b>Dodaj Dokument</b></a>.
                            </div>
                        </div>
                        <div class="row">
							<label class="col-3"></label>
							<div class="col-9">
								<h6 class="text-dark font-weight-bold mb-10">Dane dokumentów:</h6>
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Dokumenty ważne od:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid datepicker" style="width: 100% !important;" type="text" value="{{ $protective->edit_date }}" name="edit_date" id="edit_date" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Status dokumentów:</label>
                            <div class="col-9">
                                <select class="form-control form-control-lg form-control-solid" value="{{ $protective->status }}" name="status" id="status">
                                    <option value="A" @if($protective->status == 'A') selected @endif>Aktywne</option>
                                    <option value="N" @if($protective->status == 'N') selected @endif>Archiwalne</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js/pages/products/protectives/edit.js') }}" type="text/javascript"></script>
@endpush