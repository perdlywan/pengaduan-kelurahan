@extends('layouts.home')

@section('title', 'Pengaduan Masyarakat Kelurahan Kabayan | Edit Pengaduan')

@section('content')
<div class="hero bg-white rounded-3 shadow m-2 m-sm-4 m-md-0" style="padding-bottom: 4rem;">
    <h1 style="color: #243142;">{{ $title }}</h1>

    <form id="form-pengaduan" action="/pengaduan/{{ $pengaduan->id }}" method="POST" enctype="multipart/form-data">
        @method('put')
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
            <img src="{{ asset('/images/pengaduan/' . $pengaduan->foto) }}" id="preview" class="img-thumbnail">
        </div>
        <div class="form-group">
            <label class="form-label">Pesan<sup class="text-danger">*</sup></label>
            <textarea id="pesan" class="form-control @error('pesan') is-invalid @enderror" name="pesan" rows="6" placeholder="Pesan">{{ old('pesan', $pengaduan->pesan) }}</textarea>
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
@endsection

@section('scripts')
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