@extends('layouts.app')

@section('content')

<link rel="stylesheet" media="screen" href="{{ asset('topbox/css/topbox.css') }}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload a JPG image, MP4 video, or PDF document') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" enctype="multipart/form-data" action="{{ route('upload.file') }}">
                        @csrf
                        <div class="custom-file mb-2">
                            <label class="custom-file-label" for="myfile">Choose file</label>
                            {{-- Easy to circumvent mime types, but helps non-malicious
                            users pick right file without round trip to server. --}}
                            <input type="file" class="custom-file-input" id="myfile"
                                    accept="image/jpeg, video/mp4, application/pdf" name="myfile" />
                        </div>
                        <div id="file-selected" class="pl-2 mb-2 d-none"></div>
                        <input class="form-control" type="text" placeholder="Caption (optional)"
                            name="caption" id="caption" />
                        <button id="submit" type="submit" class="btn btn-success mt-3" disabled>Upload</button>
                    </form>

                    {{-- If files exist. --}}
                    @if ($files)
                        <div class="mt-5">
                            <h3>
                                My Uploaded Files
                            </h3>
                            <p>Click a thumbnail or icon to preview the file.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="d-flex">
                                            <th class="col-3">File</th>
                                            <th class="col-6">Caption</th>
                                            <th class="col-3">Type</th>
                                        </tr>
                                    </thead>
                                    @foreach($files as $file)
                                    <tr class="d-flex">
                                        <td class="col-3">
                                            <a href="{{ asset($file->path) }}" class="lightbox" aria-haspopup="dialog" title="{{ $file->caption }}" >
                                                @if ($file->type == "JPEG")
                                                    <img src={{ asset($file->path) }} class="img-thumbnail" />
                                                @endif
                                                @if ($file->type == "MP4")
                                                    <img src={{ asset('images/icon-mp4.png') }} class="img-thumbnail" />
                                                @endif
                                                @if ($file->type == "PDF")
                                                    <img src={{ asset('images/icon-pdf.png') }} class="img-thumbnail" />
                                                @endif
                                            </a>
                                        </td>
                                        <td class="col-6">{{ $file->caption }}</td>
                                        <td class="col-3">{{ $file->type}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>

@push('closing-scripts')
    <script src="{{ asset('topbox/js/topbox.js') }}" defer></script>
    <script src="{{ asset('js/upload.js') }}" defer></script>
@endpush

@endsection
