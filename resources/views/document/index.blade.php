@extends('layouts.app')
@section('page-title', '')
@section('content')
    @include('includes.success')
    <div class="accordion mb-3" id="accordionParent">
        <div class="accordion-item rounded-0 shadow-sm">
            <h5 class="accordion-header m-0" id="headingOne">
                <button class="accordion-button fw-semibold collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse" aria-expanded="false" aria-controls="collapse">
                    <span class="h6 fw-medium">What are you looking for?</span>
                </button>
            </h5>
            <div id="collapse" class="accordion-collapse collapse" aria-labelledby="headingOne"
                data-bs-parent="#accordionParent" style="">
                <div class="accordion-body">
                    <div class="row mt-2">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="fileType" class="fw-medium text-uppercase">File type</label>
                                <select class="form-control" id="fileType">
                                    <option value="*" selected>All</option>
                                    @foreach ($availableFileTypes as $fileType)
                                        <option {{ request()->type == $fileType ? 'selected' : '' }}
                                            value="{{ $fileType }}">{{ $fileType }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="accessLevel" class="fw-medium text-uppercase">Access Level</label>
                                <select class="form-control" id="accessLevel">
                                    <option value="*" selected>All</option>
                                    @foreach ($accessLevels as $accessLevel)
                                        <option {{ request()->level == $accessLevel->value ? 'selected' : '' }}
                                            value="{{ $accessLevel }}">{{ $accessLevel }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="officeResponsible" class="fw-medium text-uppercase">Office
                                    Responsible</label>
                                <select class="form-control" id="officeResponsible">
                                    <option value="*" selected>All</option>
                                    @foreach ($offices as $office)
                                        <option {{ request()->office == $office->id ? 'selected' : '' }}
                                            value="{{ $office->id }}">{{ $office->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="uploadedBy" class="fw-medium text-uppercase">Uploaded by</label>
                                <select class="form-control" id="uploadedBy">
                                    <option value="*" selected>All</option>
                                    @foreach ($availableUploadedBy as $employeeID => $uploadedBy)
                                        <option {{ request()->uploaded == $employeeID ? 'selected' : '' }}
                                            value="{{ $employeeID }}">{{ $uploadedBy }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="text-end">
                        <input type="submit" class="btn btn-soft-primary mb-2" id="btnSubmitFilter" value="Apply Filters">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="card rounded-0">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-title fw-medium">
                Complete listing <span class="text-lowercase">of</span> <span class="fw-bold">Forms</span>
            </div>
            <div>
                <a href="{{ route('document.create') }}" class="btn btn-soft-primary fw-medium">
                    Import Form / Template
                </a>
            </div>
        </div>
        <div class="card-body">
            @if ($forms->isEmpty())
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ asset('/assets-2/images/error.svg') }}" class="img-fluid w-25" alt="">
                    <h6 class="fw-medium text-danger">No file records available</h6>
                </div>
            @else
                <div class="row">
                    @foreach ($forms as $document)
                        <div class="col-lg-4 mb-2" id="file-record-{{ $document->id }}">
                            <div class="card rounded-0 shadow-sm">
                                <div
                                    class="card-text border border-bottom p-2 pt-0 border-0 d-flex align-items-center justify-content-between">
                                    <div>
                                        @foreach ($document?->tags as $tag)
                                            <span class="badge bg-soft-primary">
                                                {{ $tag->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                    <div class="button-items text-end mt-2">
                                        <button type="button" class="btn btn-light btn-sm dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                <path
                                                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('document.edit', $document) }}">Edit</a>
                                            <a class="dropdown-item" href="{{ route('document.download', $document->id) }}"
                                                download>Download</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item"
                                                href="{{ route('document-process.create', $document) }}">Service Process
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="media d-flex mb-3 float-end">
                                        <div @class([
                                            'rounded-circle',
                                            'shadow',
                                            'p-2',
                                            'text-white',
                                            'align-middle',
                                            'text-center',
                                            'bg-danger' => $document->file_type == 'pdf',
                                            'bg-primary' =>
                                                $document->file_type == 'doc' || $document->file_type == 'docx',
                                            'bg-success' =>
                                                $document->file_type == 'xls' || $document->file_type == 'xlsx',
                                            'bg-warning' =>
                                                $document->file_type == 'ppt' || $document->file_type == 'pptx',
                                        ])>
                                            @if ($document->file_type == 'doc' || $document->file_type == 'docx')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                    fill="currentColor" class="bi bi-file-earmark-word-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.485 6.879l1.036 4.144.997-3.655a.5.5 0 0 1 .964 0l.997 3.655 1.036-4.144a.5.5 0 0 1 .97.242l-1.5 6a.5.5 0 0 1-.967.01L8 9.402l-1.018 3.73a.5.5 0 0 1-.967-.01l-1.5-6a.5.5 0 1 1 .97-.242z" />
                                                </svg>
                                            @elseif($document->file_type == 'ppt' || $document->file_type == 'pptx')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                    fill="currentColor" class="bi bi-file-earmark-ppt-fill"
                                                    viewBox="0 0 16 16">
                                                    <path d="M8.188 10H7V6.5h1.188a1.75 1.75 0 1 1 0 3.5z" />
                                                    <path
                                                        d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM7 5.5a1 1 0 0 0-1 1V13a.5.5 0 0 0 1 0v-2h1.188a2.75 2.75 0 0 0 0-5.5H7z" />
                                                </svg>
                                            @elseif($document->file_type == 'pdf')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                    fill="currentColor" class="bi bi-file-earmark-pdf-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                                    <path fill-rule="evenodd"
                                                        d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                                </svg>
                                            @elseif($document->file_type == 'xls' || $document->file_type == 'xlsx')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                    fill="currentColor" class="bi bi-file-earmark-excel-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z" />
                                                </svg>
                                            @endif
                                        </div>
                                        <div class="media-body align-self-center text-truncate ms-2 btn-download-file">
                                            <a href="#" download data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-title="Click to download!">
                                                <h4 class="m-0 fw-semibold text-dark font-16"
                                                    style="pointer-events:none;">
                                                    {{ str_replace('..mp3', '.mp3', $document->file) }}
                                                </h4>
                                            </a>
                                        </div>
                                        <!--end media-body-->
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6 class="fw-semibold mb-0">
                                            <span class="text-muted font-weight-normal">
                                                {{ $document->uploaded_at->format('F d, Y h:i A') }}
                                            </span>
                                        </h6>
                                    </div>
                                    <div class="mt-3">
                                        <h5 class="font-18 m-0">{{ $document->name }}</h5>
                                        <p class="mb-0 fw-semibold mt-2">
                                            {{ $document?->office_responsible_detail?->name }}
                                        </p>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="fw-semibold">Access Level : <span
                                                    @class([
                                                        'badge',
                                                        'text-capitalize',
                                                        'bg-soft-info' => $document->access_level === 'private',
                                                        'bg-soft-primary' => $document->access_level === 'public',
                                                        'bg-soft-danger' => $document->access_level === 'restricted',
                                                    ])>{{ $document->access_level }}</span>
                                            </h6>

                                            <h6 class="fw-semibold">Uploaded : <span
                                                    class="font-weight-normal">{{ $document?->uploaded_by_detail?->fullname }}</span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                        </div>
                    @endforeach
                    <div class="container-fluid">
                        <div class="float-end">
                            {{ $forms->links() }}
                        </div>
                    </div>
                    <!--end col-->
                </div>
            @endif
        </div>
    </div>
    @push('page-scripts')
        <script>
            let baseUrl = "/document";

            let queryParams = {
                type: "{{ request()->type }}",
                level: "{{ request()->level }}",
                office: "{{ request()->office }}",
                uploaded: "{{ request()->uploaded }}"
            };

            const buildUrl = (query) => {
                for ([key, value] of Object.entries(query)) {
                    if (value === '') {
                        delete query[key];
                    }
                }

                const queryString = Object.keys(query)
                    .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(queryParams[key]))
                    .join('&');

                return baseUrl + '?' + queryString;
            };


            document.querySelector('#fileType').addEventListener('change', function(e) {
                let fileType = e.target.value;
                if (fileType === '*') {
                    delete queryParams.type;
                } else {
                    queryParams['type'] = e.target.value;
                }
            });

            document.querySelector('#accessLevel').addEventListener('change', function(e) {
                let accessLevel = e.target.value;
                if (accessLevel === '*') {
                    delete queryParams.level;
                } else {
                    queryParams['level'] = accessLevel;
                }
            });

            document.querySelector('#officeResponsible').addEventListener('change', function(e) {
                let officeResponsible = e.target.value;
                if (officeResponsible === '*') {
                    delete queryParams.office;
                } else {
                    queryParams['office'] = officeResponsible;
                }
            });

            document.querySelector('#uploadedBy').addEventListener('change', function(e) {
                let uploadedBy = e.target.value;
                if (uploadedBy === '*') {
                    delete queryParams.uploaded;
                } else {
                    queryParams['uploaded'] = uploadedBy;
                }
            });

            document.querySelector('#btnSubmitFilter').addEventListener('click', function() {
                window.location.href = buildUrl(queryParams);
            });
        </script>
    @endpush
@endsection
