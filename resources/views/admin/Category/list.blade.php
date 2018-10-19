@extends('admin.layout.master')

@section('content')
<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Category</a>
            </li>
            <li class="breadcrumb-item active">list</li>
          </ol>


 <!-- DataTables Example -->
            <div class="card-body">
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
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $category)
                    <tr>
                      <td>{{ $category->id }}</td>
                      <td>{{ $category->name }}</td>
                      <td><img src="{{ asset('storage/'.$category->img) }}" style="width: 50px;"></td>
                      <td><a href="">Edit</a></td>
                      <td>2009/01/12</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                  {{ $categories->links()}}
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
        </div>

@endsection