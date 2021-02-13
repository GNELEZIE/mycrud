@extends('layout.master')


@section('content')

<div class="container pt-5">
    <div class="row pt-5">
       <div class="col-md-10  pt-5">
        <div class="card text-black bg-default mb-3" style="max-width: 58rem;">
            <div class="card-header text-center">{{ $student->name }} </div>
            <div class="card-body">
                @if(Session::has('ajouter'))
                <div class="alert alert-success" role="alert">
                   {{ Session::get('ajouter') }}
                  </div>
                @endif
                @if(Session::has('update'))
                <div class="alert alert-success" role="alert">
                   {{ Session::get('update') }}
                  </div>
                @endif

                @if(Session::has('delete'))
                <div class="alert alert-danger" role="alert">
                   {{ Session::get('delete') }}
                  </div>
                @endif


                <table class="table table-striped">
                    <thead>
                      <tr>
                    
                    
                        <th scope="col">Photo</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                          
                        
                            <td><img src="{{ asset('images/') }}/{{ $student->image }}" style="max-width: 130px"/></td>
                            <td>
                                <td><a href="#" class="btn btn-primary"><i class="far fa-eye"></i></a></td>
                                <td><a href="{{ route('student.edit', $student->id) }}" class="btn btn-success"><i class="fas fa-pencil"></i></span></a></td>
                                <td><a href="{{ route('student.delete', $student->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                            </td>

                          </tr>
                       


                    </tbody>
                  </table>
                   <a href="{{ route('home') }}" class="btn btn-warning"><i class="fas fa-arrow-alt-left"></i>Retour</a>
            </div>
          </div>

       </div>
    </div>
</div>



@endsection
