@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $title }}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        @foreach (Breadcrumbs::generate('pengaduan.create') as $breadcrumb)
                            @if (!is_null($breadcrumb->url) && !$loop->last)
                                <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                            @else
                                <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                            @endif
                        @endforeach
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form id="form-pengaduan" action="/pengaduan" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="user_id" />
                                    <input type="hidden" name="status" value="proses" />
                            
                                    <div class="form-group mb-3">
                                        <label class="form-label">Foto</label>
                                        <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" />
                                        @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Pesan<sup class="text-danger">*</sup></label>
                                        <textarea id="pesan" class="form-control @error('pesan') is-invalid @enderror" name="pesan" rows="6" placeholder="Pesan">{{ old('pesan') }}</textarea>
                                        @error('pesan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#foto').change(function(){
            const file = this.files[0];
            if (file){
                let reader = new FileReader();
                reader.onload = function(event){
                    $('#preview').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    })
</script>
@endsection