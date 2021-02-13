@extends('layout.master')


@section('content')

<div class="container pt-5">
    <div class="row pt-5">
       <div class="col-md-6 offset-md-3 pt-5">
        <div class="card text-black bg-default mb-3" style="max-width: 18rem;">
            <div class="card-header text-center">Inscription user</div>
            <div class="card-body">


                <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="name">Nom </label>
                      <input type="text" class="form-control" id="name" name="name" class="@error('name') is-invalid @enderror" aria-describedby="name" placeholder="Entrer votre nom">
                    
                    </div>
                    <div class="form-group">
                      <label for="image">Photo de profil</label>
                      <input type="file" class="form-control" id="image" name="image" class="@error('image') is-invalid @enderror" onchange="previewFil(this)">
                        
                      <img id="ImgView" class="rounded-circle pt-2" style="max-width:111px"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
          </div>

       </div>
    </div>
</div>



@endsection
@section('script')
<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
<script>
    function previewFil(input){
        var file=$("input[type=file]").get(0).files[0];
        if(file)
        {
            var reader = new FileReader();
            reader.onload = function(){
                $('#ImgView').attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }
    }

      </script>

      @endsection
