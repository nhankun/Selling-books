@extends('admin.layout.master')

@section('content')
<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('book.index') }}">Books</a>
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
                      <th>Name</th>
                      <th>Desc</th>
                      <th>Categoy_id</th>
                      <th>Price</th>
                      <th>Image</th>
                      <th>Quanlity</th>
                      <th>Status</th>
                      <th>author_id</th>
                      <th>publishing_com</th>
                      <th>number_of_pages</th>
                      <th>cover_type</th>
                      <th>publication_date</th>
                      <th>release_com</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($books as $book)
                    <tr>
                      <td>{{ $book->id }}</td>
                      <td>{{ $book->name }}</td>
                      <td>{{ $book->desc }}</td>
                      <td>{{ $book->category_id }}</td>
                      <td>{{ $book->price }}</td>
                      <td><img src="{{asset('storage/'.$book->Images[0]->path)}}" width="80px"></td>
                      <td>{{ $book->quanlity }}</td>
                      <td>{{ $book->status }}</td>
                      <td>{{ $book->author_id }}</td>
                      <td>{{ $book->publishing_com }}</td>
                      <td>{{ $book->number_of_pages }}</td>
                      <td>{{ $book->cover_type }}</td>
                      <td>{{ $book->publication_date }}</td>
                      <td>{{ $book->release_com }}</td>
                      <td style="text-align: center;"><a href="{{ route('book.edit', $book->id) }}">Edit</a></td>
                      <td style="text-align: center;">
                        <button type="submit" value="{{$book->id}}" class="btn btn-danger btndelete">
                          <i class="fas fa-trash-alt"></i> 
                        </button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                  {{ $books->links()}}
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    var button = $('.btndelete');
    button.click(function(){
        if (confirm("Do you want to delete?")) {
            var url = '{{ route("book.destroy", ":id") }}';
            url = url.replace(':id', $(this).val());
            window.location.href=url;
        }
    });
});
</script>
@endsection