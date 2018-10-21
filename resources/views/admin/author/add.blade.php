@extends('admin.layout.master')

@section('content')
<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('author.index') }}">Author</a>
            </li>
            <li class="breadcrumb-item active">Add</li>
          </ol>


 <!-- DataTables Example -->
            <div class="card-body">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              <form class="form-horizontal" method="post" action="{{ route('author.store') }}">
                  @csrf
                <div class="form-group">
                  <label class="control-label col-sm-2" for="name">Author name:</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" required="" placeholder="Enter name" name="name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="address">Author address:</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="address" required="" placeholder="Enter address" name="address">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Author email:</label>
                  <div class="col-sm-12">
                    <input type="email" class="form-control" id="email" required="" placeholder="Enter email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="phone">Author phone:</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="phone" required="" placeholder="Enter phone" name="phone">
                  </div>
                </div>
                
                
                <div class="form-inline">        
                  <div class="col-sm-offset-1 col-sm-1">
                    <button type="submit" class="btn btn-info">Add</button>
                  </div>
                  <div>
                    <button type="reset" class="btn btn-info">Reset</button>
                  </div>
                </div>
              </form>

@endsection