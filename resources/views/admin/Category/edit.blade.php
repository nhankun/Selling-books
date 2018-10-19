@extends('admin.layout.master')

@section('content')
<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Category</a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>


 <!-- DataTables Example -->
            <div class="card-body">
              <form class="form-horizontal" action="#">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="name">Category name:</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="img">Category Image:</label>
                  <div class="col-sm-12">          
                    <input type="file" class="btn" id="img" name="img">
                  </div>
                </div>
                
                <div class="form-inline">        
                  <div class="col-sm-offset-1 col-sm-1">
                    <button type="submit" class="btn btn-info">Edit</button>
                  </div>
                  <div>
                    <button type="reset" class="btn btn-info">Reset</button>
                  </div>
                </div>
              </form>

@endsection