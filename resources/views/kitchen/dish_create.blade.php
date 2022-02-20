@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kitchen Create Panel</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Dishes Create Panel</h3>
                        <div class="float-right">
                          <a href="/dish" class="btn btn-default">Back</a>
                        </div>
                        </div>        
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
                            <form action="/dish" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Dish Name</label>
                                    <input value="{{old('name')}}" type="text" name="name" class="form-control" placeholder="Enter Dish Name">
                                </div>
                                <div class="form-group">
                                    <label for="">Category Name</label>
                                        <select name="category" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="dish_image">
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
</body>
</html>