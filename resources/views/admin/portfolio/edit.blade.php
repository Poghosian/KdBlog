@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Portfolies</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                    </div>
                    <form action="{{route('admin.portfolio.update', $portfolio->id)}}" method="POST" class="w-25" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input value="{{$portfolio->title}}" type="text" class="form-control mb-2" name="title" placeholder="Name of portfolio">
                            @error('title')
                                <div class="text-danger">{{ $errors->first('title') }}</div>
                            @enderror
                            <img style="width: 200px;"  src="{{$portfolio->image ? asset('storage/images/'. $portfolio->image) : asset('kd-images/no-image.webp')}}">
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label" >Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            @error('image')
                            @foreach($errors->get('image') as $error)
                                     <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            @enderror
                        </div>
                        <select type="text" class="form-control mb-2" name="category_id">

                            <option value="">Select Category</option>
                            @foreach($category as $cat)
                                <option  {{$cat->id == $portfolio->category_id ? 'selected' : null}} value="{{$cat->id}}">{{$cat->title}}</option>
                            @endforeach

                        </select>
                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
