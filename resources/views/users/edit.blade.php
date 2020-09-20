@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap mr-2">

		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
			
            <li class="breadcrumb-item">
				<span class="text-muted">{{ $description }}</span>
			</li>

		</ul>
	</div>
	<div class="d-flex align-items-center">

		<a href="{{ url()->previous() }}" class="btn btn-clean btn-icon-sm">
			<i class="la la-arrow-left"></i>Anuluj
		</a>

        <input type="submit" class="btn btn-light-primary btn-icon-sm ml-1" form="user_update_form" value="Zapisz">

	</div>
</div>
@stop

@section('content')
<div class="container">
    <div class="row">
	    
        <div class="col-12 col-md-4">
            <x-cards.user :user="$user" />
        </div>

        <div class="col-12 col-md-8">

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
                                        <span class="svg-icon mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"/>
                                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-text font-weight-bold">Dane personalne</span>
                                </a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" data-toggle="tab" href="#files" role="tab">
                                    <span class="nav-icon mr-2">
                                        <span class="svg-icon mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M14.8875071,12.8306874 L12.9310336,12.8306874 L12.9310336,10.8230161 C12.9310336,10.5468737 12.707176,10.3230161 12.4310336,10.3230161 L11.4077349,10.3230161 C11.1315925,10.3230161 10.9077349,10.5468737 10.9077349,10.8230161 L10.9077349,12.8306874 L8.9512614,12.8306874 C8.67511903,12.8306874 8.4512614,13.054545 8.4512614,13.3306874 C8.4512614,13.448999 8.49321518,13.5634776 8.56966458,13.6537723 L11.5377874,17.1594334 C11.7162223,17.3701835 12.0317191,17.3963802 12.2424692,17.2179453 C12.2635563,17.2000915 12.2831273,17.1805206 12.3009811,17.1594334 L15.2691039,13.6537723 C15.4475388,13.4430222 15.4213421,13.1275254 15.210592,12.9490905 C15.1202973,12.8726411 15.0058187,12.8306874 14.8875071,12.8306874 Z" fill="#000000"/>
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-text font-weight-bold">Konto</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body px-0">
                    {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT', 'id' => 'user_update_form']) !!}
                    {!! Form::token() !!}
                        <div class="tab-content">
                            <div class="tab-pane active px-7" id="info" role="tabpanel">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-8">
                                        
                                        <div class="row">
                                            <label class="col-3"></label>
                                            <div class="col-9">
                                                <h6 class="text-dark font-weight-bold mb-10">Dane użytkownika:</h6>
                                            </div>
                                        </div>

                                        <div class="form-group row">
											<label class="col-xl-3 col-lg-3 text-right col-form-label">Avatar</label>
											<div class="col-lg-9 col-xl-9">
												<div class="image-input image-input-outline image-input-circle" id="kt_user_avatar">
													<div class="image-input-wrapper" style="background-image: url({{ asset('storage/uploads/avatars/') }}/{{ $user->avatar_filename }})"></div>
													<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Zmień avatar">
														<i class="fa fa-pen icon-sm text-muted"></i>
														<input type="file" name="profile_avatar" id="profile_avatar" accept=".png, .jpg, .jpeg" />
														<input type="hidden" name="profile_avatar_remove" />
													</label>
													<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Usuń avatar">
														<i class="ki ki-bold-close icon-xs text-muted"></i>
													</span>
													<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Usuń avatar">
														<i class="ki ki-bold-close icon-xs text-muted"></i>
													</span>
												</div>
											</div>
										</div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Imię</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->first_name }}" name="first_name" id="first_name">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Nazwisko</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->last_name }}" name="last_name" id="last_name">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">E-mail</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->email }}" name="email" id="email">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Telefon</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->phone }}" name="phone" id="phone">
                                            </div>
                                        </div>

                                        <div class="separator separator-dashed my-10"></div>

                                        <div class="row">
                                            <label class="col-3"></label>
                                            <div class="col-9">
                                                <h6 class="text-dark font-weight-bold mb-10">Praca:</h6>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Nazwa firmy</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->company }}" name="company" id="company">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Lokalizacja</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->location }}" name="location" id="location">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Departament</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->department }}" name="department" id="department">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Stanowisko</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->position }}" name="position" id="position">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Opis</label>
                                            <div class="col-9">
                                                <textarea class="form-control form-control-lg form-control-solid" rows="4" name="description" id="description">{{ $user->description }}</textarea>
                                            </div>
                                        </div>
                                                
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane px-7" id="files" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-7 my-2">
                        
                                        <div class="row">
                                            <label class="col-3"></label>
                                            <div class="col-9">
                                                <h6 class="text-dark font-weight-bold mb-10">Dane konta:</h6>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Nazwa użytkownika</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" style="width: 100% !important;" type="text" value="{{ $user->username }}" name="username" id="username">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Hasło</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" style="width: 100% !important;" type="password" value="{{ $user->password }}" name="password" id="password">
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

    </div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/users/edit.js') }}" type="text/javascript"></script>
@stop