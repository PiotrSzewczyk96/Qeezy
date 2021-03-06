<div class="card pt-4 mb-6 mb-xl-9">
    <div class="card-header border-0">
        <div class="card-title">
            <h2>Dokumenty</h2>
        </div>
        <div class="card-toolbar">
            @if($files->where('draft', 1)->count() > 0)
            <a name="non-active" class="btn btn-light-primary font-weight-bold btn-flex btn-sm ms-2" id="show-draft-files"  data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Pokaż dokumenty robocze">
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M11,3 L11,11 C11,11.0862364 11.0109158,11.1699233 11.0314412,11.2497543 C10.4163437,11.5908673 10,12.2468125 10,13 C10,14.1045695 10.8954305,15 12,15 C13.1045695,15 14,14.1045695 14,13 C14,12.2468125 13.5836563,11.5908673 12.9685588,11.2497543 C12.9890842,11.1699233 13,11.0862364 13,11 L13,3 L17.7925828,12.5851656 C17.9241309,12.8482619 17.9331722,13.1559315 17.8173006,13.4262985 L15.1298744,19.6969596 C15.051085,19.8808016 14.870316,20 14.6703019,20 L9.32969808,20 C9.12968402,20 8.94891496,19.8808016 8.87012556,19.6969596 L6.18269936,13.4262985 C6.06682778,13.1559315 6.07586907,12.8482619 6.2074172,12.5851656 L11,3 Z" fill="#000000"/>
                            <path d="M10,21 L14,21 C14.5522847,21 15,21.4477153 15,22 L15,23 L9,23 L9,22 C9,21.4477153 9.44771525,21 10,21 Z" fill="#000000" opacity="0.3"/>
                        </g>
                    </svg>
                </span>
                Pokaż robocze
            </a>
            @endif
            <a href="{{ route('files.zip', ['id' => $files->where('draft', 0)->pluck('id')->toArray(), 'name' => $name]) }}" class="btn btn-light-success font-weight-bold btn-flex btn-sm ms-2" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Pobierz wszystkie dokumenty jako <b>.zip</b>">
                @include('svg.zip', ['class' => 'svg-icon svg-icon-3'])
                Pobierz jako .zip
            </a>
            @can('create', App\Models\File::class)
            <a href="{{ route('files.create', ['fileable_type' => $fileable_type, 'fileable_id' => $fileable_id]) }}" class="btn btn-light-primary font-weight-bold btn-flex btn-sm ms-2" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Pobierz wszystkie dokumenty jako <b>.zip</b>">
                @include('svg.file', ['class' => 'svg-icon svg-icon-3'])
                Dodaj dokument
            </a>
            @endcan
        </div>
    </div>
    <div class="card-body pt-0">
        @if($model->status == 'Archiwalny')<x-cards.archive-files />@endif
        <div class="row p-0 m-0">
        @foreach ($fileCategories->split(2) as $split)
            <div class="col-md-6 p-0 m-0">
                @foreach($split as $category)
                <div class="card card-custom p-0 m-0">
                    <div class="card-header border-0 p-0 m-0 min-h-60px">
                        <h3 class="card-title fw-bold text-dark">{{ $category->name }}</h3>
                        <div class="card-toolbar mx-3">
                            <a href="{{ route('files.zip', ['id' => $files->where('draft', 0)->where('file_category_id', $category->id)->pluck('id')->toArray(), 'name' => $category->name]) }}" class="btn btn-active-light-primary btn-color-primary btn-sm" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Pobierz poniższe dokumenty jako <b>.zip</b>">
                                @include('svg.zip', ['class' => 'navi-icon'])Pobierz .zip
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0 m-0">
                    @foreach($files->where('file_category_id', $category->id) as $file)
                        <div class="d-flex align-items-center mb-5"
                            @if($file->draft == 1)
                                name="draft" style="display: none !important;"
                            @endif
                        >
                            <div class="me-3">
                                <a href="{{ route('files.show', $file->id) }}" target="_blank"><img src="{{ asset('/media/files/' . $file->extension . '.svg') }}" style="width: 35px;" alt="{{ $file->name }}"></a>
                            </div>
                            <div class="d-flex flex-column flex-grow-1">
                                <a href="{{ route('files.show', $file->id) }}" class="fs-7 fw-bold text-dark mt-auto" target="_blank">
                                    {{ $file->name }}
                                </a>
                                <a href="{{ route('files.show', $file->id) }}" class="fs-7 fw-normal text-gray-400 mt-auto" target="_blank">
                                    Data ostatniej edycji: {{ date('Y-m-d', strtotime($file->updated_at)) }}
                                </a>
                            </div>
                            <div class="dropdown dropdown-inline mx-3">
                                <a class="btn btn-sm btn-clean btn-icon"data-toggle="dropdown" aria-expanded="false" title="Więcej">
                                    <i class="flaticon-more-1"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="navi navi-hover flex-column">
                                        @if($file->extension == 'pdf')
                                        <li class="navi-item">
                                            <a href="{{ route('files.show', $file->id) }}" class="navi-link" target="_blank">
                                                <i class="navi-icon flaticon2-expand"></i>
                                                <span class="navi-text">{{ __('View') }}</span>
                                            </a>
                                        </li>
                                        @endif
                                        <li class="navi-item">
                                            <a href="{{ route('files.download', $file->id) }}" class="navi-link" target="_blank">
                                                <i class="navi-icon flaticon2-download-2"></i>
                                                <span class="navi-text">Pobierz</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a class="navi-link" onclick="ShareFiles('{{ $file->id }}')">
                                                <i class="navi-icon flaticon2-reply-1"></i>
                                                <span class="navi-text">Udostępnij</span>
                                            </a>
                                        </li>
                                        @can('update', $file)
                                            <div class="dropdown-divider"></div>
                                            <li class="navi-item">
                                                <a href="{{ route('files.edit', $file->id) }}" class="navi-link">
                                                    <i class="navi-icon flaticon2-edit"></i>
                                                    <span class="navi-text">Edytuj</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create', App\Models\File::class)
                                            <li class="navi-item">
                                                <a href="{{ route('files.replace', ['file' => $file, 'fileable_type' => $fileable_type, 'fileable_id' => $fileable_id]) }}" class="navi-link">
                                                    <i class="navi-icon flaticon2-refresh-1"></i>
                                                    <span class="navi-text">Zastąp</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('update', $file)
                                            <li class="navi-item">
                                                <a href="{{ route('files.detach', ['file' => $file, 'fileable_type' => $fileable_type, 'fileable_id' => $fileable_id]) }}" class="navi-link">
                                                    <i class="navi-icon flaticon2-line"></i>
                                                    <span class="navi-text">Odepnij</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('delete', $file)
                                            <li class="navi-item">
                                                <a onclick='document.getElementById("file_destroy_{{ $file->id }}").submit();' class="navi-link" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Dokument zostanie usunięty we <b>wszystkich</b> obiektach z którymi jest powiązany!">
                                                    <i class="navi-icon flaticon2-trash"></i>
                                                    <span class="navi-text">Usuń</span>
                                                </a>
                                                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'files.destroy', $file->id ], 'id' => 'file_destroy_' . $file->id ]) }}{{ Form::close() }}
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</div>
