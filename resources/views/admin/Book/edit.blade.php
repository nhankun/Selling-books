@extends('admin.layout.master')

@section('content')
<!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('book.index') }}">Book</a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
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
        {{--       @if (Session::has('errors'))
              <div class="alert alert-warning">
                {{Session::get('errors')}}
              </div>
              @endif --}}


              <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('book.update', $book->id) }}">
                  @method('PUT')
                  @csrf
                  <div class="row">
                    <div class="col-md-6" style="float: left;">
                          <div class="form-group">
                            <label class="control-label col-sm-12" for="name">Book name:</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="name" value="{{ $book->name }}" name="name" required="">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-12" for="desc">Book desc:</label>
                            <div class="col-sm-12">
                              <textarea class="form-control" id="desc" name="desc" rows="3" >{{ $book->desc }}</textarea>
                            </div>
                          </div>
                          <div class="form-group col-sm-12">
                            <label class="control-label" for="category_id">Category_id:</label>
                            <select class="form-control" name="category_id" required="">
                                @foreach($CategoriesCom as $Cate_id => $Cate_name)
                                  <option value="{{ $Cate_id }}"
                                    @if(old('Cate_id', isset($book) ? $book->category_id : '') == $Cate_id) 
                                      selected="selected"
                                    @endif
                                  >{{ $Cate_name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-12" for="price">Book price:</label>
                            <div class="col-sm-12">
                              <input type="number" class="form-control" id="price" value="{{ $book->price }}" name="price" required="">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-12" for="quanlity">Book quanlity:</label>
                            <div class="col-sm-12">
                              <input type="number" class="form-control" id="quanlity" value="{{ $book->quanlity }}" name="quanlity" required="">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-12" for="price_sale">Book price_sale:</label>
                            <div class="col-sm-12">
                              <input type="number" class="form-control" id="price_sale" value="{{ $book->price_sale }}" name="price_sale" >
                            </div>
                          </div>
                          {{-- <div class="form-group">
                            <label class="control-label col-sm-12" for="img">Book Image:</label>
                            <div class="col-sm-12">  
                              <img src="{{asset('storage/'.$book->Images[0]->path)}}" width="80px">        
                              <input type="file" name="img[]" multiple class="btn" id="img">
                            </div>
                          </div> --}}
                  </div>
                  <div class="col-md-6" style="float: right;">
                        <div class="form-group">
                          <label class="control-label col-sm-12" for="release_com">Book release_com:</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="release_com" value="{{ $book->release_com }}" name="release_com">
                          </div>
                        </div>
                        <div class="form-group col-sm-12">
                          <label class="control-label" for="author_id">Author_id:</label>
                          <select class="form-control" name="author_id" required="">
                              @foreach($AuthorCom as $Author_id => $Author_name)
                                <option value="{{ $Author_id }}" 
                                    @if(old('Author_id', isset($book) ? $book->Author_id : '') == $Author_id) 
                                      selected="selected"
                                    @endif
                                >{{ $Author_name }}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-12" for="publication_date">Book publication_date:</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="datepicker" id="publication_date" value="{{ $book->publication_date }}" name="publication_date" required="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-12" for="size">Book size:</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="size" value="{{ $book->size }}" name="size" required="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-12" for="publishing_com">Book publishing_com:</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="publishing_com" value="{{ $book->publishing_com }}" name="publishing_com" required="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-12" for="translator">Book translator:</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="translator" value="{{ $book->translator }}" name="translator" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-12" for="cover_type">Book cover_type:</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="cover_type" value="{{ $book->cover_type }}" name="cover_type" required="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-12" for="number_of_pages">Book number_of_pages:</label>
                          <div class="col-sm-12">
                            <input type="number" class="form-control" id="number_of_pages" value="{{ $book->number_of_pages }}" name="number_of_pages" required="">
                          </div>
                        </div>
                        
                        
                        
                  </div>
                </div>

                <div style="clear: both;"></div>

                
                
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