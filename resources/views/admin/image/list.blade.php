@extends('admin.layout.master')

@section('content')
<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('image.index') }}">Image Of Book</a>
            </li>
            <li class="breadcrumb-item active">list</li>
          </ol>


 <!-- DataTables Example -->
            <div class="card-body">

              @if (Session::has('success'))
              <div class="alert alert-success">
                {{Session::get('success')}}
              </div>
              @endif
              @if (Session::has('errors'))
              <div class="alert alert-warning">
                {{Session::get('errors')}}
              </div>
              @endif

              <div class="form-group">
                        <form action="" method="GET" class="form-inline">
                            <div id="custom-search-input">
                                <div class="input-group col-md-12">
                                    @csrf
                                    <input type="text" class="form-control input-md" placeholder="Search..." name="keyword" />
                                    <span class="input-group-btn">
                                    <button class="btn btn-info btn-md" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    </span>                                                                
                                </div>
                            </div>
                        </form> 
                    </div>
              <div class="table-responsive">
                <table class="table table-hover table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th>Id</th>
                      <th>Book_id</th>
                      <th>Book_name</th>
                      <th>Image</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($images as $image)
                    <tr>
                      <td>{{ $image->id }}</td>
                      <td>{{ $image->book_id }}</td>
                      <td>{{ $image->book->name ?? '' }}</td>
                      <td style="text-align: center;"><img src="{{ asset('storage/'.$image->path) }}" style="width: 50px;"></td>
                      <td style="text-align: center;"><a href="{{ route('image.edit', $image->id) }}">Edit</a></td>
                      <td style="text-align: center;">
                        <button type="submit" value="{{$image->id}}" class="btn btn-danger btndelete">
                          <i class="fas fa-trash-alt"></i> 
                        </button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                  {{ $images->links()}}
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    var button = $('.btndelete');
    button.click(function(){
        if (confirm("Do you want to delete?")) {
            var url = '{{ route("image.destroy", ":id") }}';
            url = url.replace(':id', $(this).val());
            window.location.href=url;
        }
    });
});
</script>
@endsection