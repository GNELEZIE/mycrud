@extends('layout.master')


@section('content')

<div class="container pt-5">
    <div class="row pt-5">
       <div class="col-md-6 offset-md-3 pt-5">
        <div class="card text-black bg-default mb-3" style="max-width: 18rem;">
            <div class="card-header text-center">Modifier les infos</div>
            <div class="card-body">


                <form method="POST" action="{{ route('student.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $student->id }}" />
                    <div class="form-group">
                      <label for="name">Nom </label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" aria-describedby="name" placeholder="Entrer votre nom" />

                    </div>
                    <div class="form-group">
                      <label for="image">Photo de profil</label>
                      <input type="file" class="form-control" id="image" name="image" value="{{ $student->image }}" onchange="previewFil(this)">
                      <img  src="{{ asset('images/') }}/{{ $student->image }}" id="ImgView" class="rounded-circle pt-2" style="max-width:111px"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Modifier</button>
                    <a href="{{ route('home') }}" class="btn btn-warning"><i class="fas fa-arrow-alt-left"></i>Retour</a>
                  </form>
            </div>
          </div>

       </div>
    </div>
</div>



@endsection
@section('script')
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
