@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Adding Portfolies</h1>
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
                    <form action="{{route('admin.portfolio.store')}}" method="POST" class="w-50" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" value="{{old('title') ?? null}}" class="form-control mb-3" name="title" placeholder="Name of portfolio">
                            @error('title')
                            <div class="text-danger">This field is required</div>
                            @enderror
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label" >Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <select type="text" class="form-control mb-2" name="category_id">
                                <option value="">Select Category</option>
                                @foreach($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                @endforeach
                            </select>
{{--                            <input type="text" class="form-control mb-2" name="category_name" placeholder="Name of category name">--}}
                            @error('title')
                            <div class="text-danger">This field is required</div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" value="Add">
                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
