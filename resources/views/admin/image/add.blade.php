@extends('admin.layout.master')

@section('content')
<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('image.index') }}">Images</a>
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

              @if (Session::has('success'))
              <div class="alert alert-success">
                {{Session::get('success')}}
              </div>
              @endif
              {{-- @if (Session::has('errors'))
              <div class="alert alert-warning">
                {{Session::get('errors')}}
              </div>
              @endif --}}

              <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('image.store') }}">
                  @csrf
                <div class="form-group col-sm-12">
                  <label class="control-label" for="category_id">Book_id:</label>
                  <select class="form-control" name="book_id" required="">
                      @foreach($BookCom as $BookCom_id => $BookCom_name)
                        <option value="{{ $BookCom_id }}">{{ $BookCom_name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="img">Book Image:</label>
                  <div class="col-sm-12">          
                    <input type="file" name="img[]" multiple required="" required="" class="btn" id="img">
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