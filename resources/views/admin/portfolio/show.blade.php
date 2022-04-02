@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-3 ">{{$portfolio->title}}</h1>
                        <a href="{{route('admin.portfolio.edit', $portfolio->id)}}" class="text-success mr-2"><i class="fas fa-pen"></i></a>
                        <form action="{{route('admin.portfolio.destroy', $portfolio->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
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
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{ $portfolio->id}}</td>
                                        </tr>
                                        <tr>
                                            <td>Title</td>
                                            <td>{{ $portfolio->title}}</td>
                                        </tr>
                                        <tr>
                                            <td>Content</td>
                                            <td>{{ $portfolio->content}}</td>
                                        </tr>
                                        <td>Category</td>
                                        <td><a href="{{route('admin.category.show', $portfolio->category->id)}}">{{ $portfolio->category->title}}</a></td>
                                        </tr>
                                        <tr>
                                            <td>Image</td>
                                            <td>
                                                <img style="width: 100px;" src="{{asset('storage/images/'.$portfolio->image)}}"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
