@extends('layout.master')


@section('content')

<div class="container pt-5">
    <div class="row pt-5">
       <div class="col-md-10  pt-5">
        <div class="card text-black bg-default mb-3" style="max-width: 58rem;">
            <div class="card-header text-center">Liste des utilisateurs <a href="{{ route('student.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></span></a></div>
            <div class="card-body">
               

          


                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                    @if (count($students)==0)
                     <p>Aucun user trouvé .................</p>
                    @else
                      
               
            
                   @foreach($students as $student)
                        <tr>
                            <th scope="row">{{ $student->id }}</th>
                            <td>{{ $student->name }}</td>
                            <td><img src="{{ asset('images/') }}/{{ $student->image }}" style="max-width: 70px"/></td>
                            <td>
                                <td><a href="{{ route('student.show', $student->id) }}" class="btn btn-primary"><i class="far fa-eye"></i></a></td>
                                <td><a href="{{ route('student.edit', $student->id) }}" class="btn btn-success"><i class="fas fa-pencil"></i></span></a></td>
                                <td>
                                <form action="{{ route('student.delete', $student->id) }}" method="POST" class="d-inline supprimer">
                                @method('DELETE')
                                @csrf

                               <button type="submit"  class="btn btn-danger"><i class="fas fa-trash"></i></button>
                              
                                
                                </td>
                            </td>

                          </tr>
                        @endforeach
                @endif
                    </tbody>
                  </table>
            </div>
          </div>

       </div>
    </div>
</div>

 
@endsection

@section('script')

@if(Session('delete') == 'ok')
  
  <script>
     Swal.fire(
            'Supprimé!',
            'Votre user a été supprimé.',
            'success' 
          )
  </script>
@endif
 
 <script>
      $('.supprimer').submit(function(e){
       
        e.preventDefault();

   Swal.fire({
        title: 'Êtes-vous sûr?',
        text: "Vous ne pourrez pas annuler cela!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Supprimer',
        cancelButtonText: 'Annuler'
      }).then((result) => {
        if (result.isConfirmed) {
          /* Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success' 
          )*/

          this.submit();
        }
      })

      });
   
    </script>
 
<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>
 
 

@endsection