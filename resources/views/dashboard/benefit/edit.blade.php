@extends('layout.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-10 mb-4 order-0">
          <div class="header">
            <h3 class="fw-bold">Edit Benefit</h3>
           </div>
            <div class="card">
                <div class="d-flex align-items-end row">
                <div class="col-12">
                    <div class="card-body">
                        <form action="/dashboard/benefit/{{ $benefit->id }}" method="post" enctype="multipart/form-data" class="m-3">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="heading" class="form-label">Heading</label>
                                <input type="text" class="form-control @error('heading') is-invalid @enderror" id="heading" 
                                name="heading" required autofocus value="{{ old('heading', $benefit->heading) }}">
                                @error('heading')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                              </div>
                              <div class="mb-3">
                                <label for="desc" class="form-label">Description</label>
                                <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" cols="30" rows="5" required autofocus>{{ old('desc', $benefit->desc) }}</textarea>
                                @error('desc')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                              </div>
                              <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="hidden" name="oldImage" value="{{ $benefit->image }}">
                                @if ($benefit->image)
                                    <img src="{{ asset('storage/' . $benefit->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                              <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                                name="image" onchange="previewImage()">
                              @error('image')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Edit Benefit</button>
                          </form> 
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage() {
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');
      imgPreview.style.display = 'block';
      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);
      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
    </script>
@endsection