@extends('layouts.welcome.app')
@prepend('page-css')
@endprepend
@section('content')
    <br>
    <br>
    <div class="container mt-5 p-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="mb-4 text-center text-uppercase">
                    <span class="typer" id="main" data-words="Explore,Search,Browse,Access" data-delay="100"
                          data-deleteDelay="1000"></span>
                    <span class="cursor" data-owner="main"></span>
                    Documents
                </h1>
                <div class="input-group mb-3">
                    <input type="text" class="form-control shadow-lg" placeholder="Search for documents..."
                           aria-label="Search Query" aria-describedby="search-button">
                    <button id="search-button" class="btn btn-primary btn-sm" type="button">Search</button>
                </div>
                <!-- Search results container -->
                <div id="search-results">
                    {{--                    <div class="card mb-3">--}}
                    {{--                        <div class="card-body">--}}
                    {{--                            <h5 class="card-title">Result Title</h5>--}}
                    {{--                            <p class="card-text">Result description goes here.</p>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="p-5">
        <table class="table table-condensed p-5 border shadow-lg">
            <thead>
            <tr>
                <th class="p-3 bg-light align-middle text-truncate text-uppercase">
                    <span class="ms-3">Campus</span>
                </th>
                <th class="p-3 bg-light align-middle text-truncate text-uppercase">Name</th>
                <th class="p-3 bg-light align-middle text-truncate text-uppercase text-center">Fiscal Year</th>
                <th class="p-3 bg-light align-middle text-truncate text-uppercase text-center">Uploaded At</th>
                <th class="p-3 bg-light align-middle text-truncate text-uppercase text-center">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($documents as $document)
                <tr>
                    <td class="p-3 align-middle text-truncate text-uppercase fw-medium">{{ $document->office_responsible_detail->campus->name }}
                        - {{ $document->office_responsible_detail->name }}
                    </td>
                    <td class="p-3 align-middle text-truncate">
                        <span class="fw-bold text-uppercase">{{ $document->name }}</span>
                        <br>
                        @foreach ($document->tags as $tag)
                            <span class="badge badge-soft-primary">
                                    {{ $tag->name }}
                                </span>
                        @endforeach
                    </td>
                    <td class="p-3 align-middle text-truncate text-center fw-medium">{{ $document->fiscal_year }}</td>
                    <td class="p-3 align-middle text-truncate text-center fw-medium">{{ $document->created_at->format('F d, Y') }}</td>
                    <td class="p-3 align-middle text-truncate text-center fw-medium">
                        <a href="" class="btn btn-primary btn-sm">Download</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="float-end d-flex align-items-center p-3 pb-1 align-middle">
                    {{ $documents->links() }}
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
    @push('page-scripts')
        <script async src="https://unpkg.com/typer-dot-js@0.1.0/typer.js"></script>
    @endpush
@endsection
