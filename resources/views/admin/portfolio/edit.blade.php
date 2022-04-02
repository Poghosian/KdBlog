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
                            <input value="{{$portfolio->content}}" type="text" class="form-control mb-2" name="content" placeholder="Name of portfolio">
                            <img style="width: 100px;" src="{{asset('storage/images/'.$portfolio->image)}}">
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
                            @error('title')
                            <div class="text-danger">This field is required</div>
                            @enderror
                        </div>
                        <select type="text" class="form-control mb-2" name="category_id">
{{--                            <option value="{{$portfolio->category->id}}">{{$portfolio->category->title}}</option>--}}
                            @foreach($category as $cat)
                                <option  {{$cat->id == $portfolio->category_id ? 'selected' : null}} value="{{$cat->id}}">{{$cat->title}}</option>
                            @endforeach
                            <option value="">Select Category</option>
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
