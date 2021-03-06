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
                      <th>Image</th>
                      <th>Desc</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>quanlity</th>
                      <th>price_sale</th>
                      <th>release_com</th>
                      <th>author</th>
                      <th>publication_date</th>
                      <th>size</th>
                      <th>publishing_com</th>
                      <th>translator</th>
                      <th>cover_type</th>
                      <th>number_of_pages</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($books as $book)
                    <tr>
                      <td>{{ $book->id }}</td>
                      <td>{{ $book->name }}</td>
                      <td>
                        @if(count($book->images) != 0)
                        <img src="{{asset('storage/'.$book->images[0]->path)}}" width="80px"></td>
                        @else
                        <p>No Image</p>
                        @endif
                      <td><input type="hidden" value="{{ $book->desc }}"><span style="color: red;">Vào edit để xem desc</span></td>
                      <td>{{ $book->category->name ?? '' }}</td>
                      <td>{{ $book->price }}</td>
                      <td>{{ $book->quanlity }}</td>
                      <td>{{ $book->price_sale }}</td>
                      <td>{{ $book->release_com }}</td>
                      <td>{{ $book->author->name ?? '' }}</td>
                      <td>{{ $book->publication_date }}</td>
                      <td>{{ $book->size }}</td>
                      <td>{{ $book->publishing_com }}</td>
                      <td>{{ $book->translator }}</td>
                      <td>{{ $book->cover_type }}</td>
                      <td>{{ $book->number_of_pages }}</td>
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