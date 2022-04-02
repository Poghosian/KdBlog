@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Portfolies</h1>
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
                    <div class="col-1 mb-3">
                        <a href="{{route('admin.portfolio.create')}}" type="button"
                           class="btn btn-block btn-primary">Add</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>description</th>
                                        <th>image</th>
                                        <th>category</th>
                                        <th colspan="3">Show</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($portfolios as $portfolio)
                                        <tr>
                                            <td>{{ $portfolio->id}}</td>
                                            <td>{{ $portfolio->title}}</td>
                                            <td>{{ $portfolio->content}}</td>
                                            <td><img style="width: 100px;" src="{{asset('storage/images/'.$portfolio->image)}}"></td>
                                            <td><a href="{{route('admin.category.show', $portfolio->category->id)}}">{{ $portfolio->category->title}}</a></td>
                                            <td><a href="{{route('admin.portfolio.show', $portfolio->id)}}"><i
                                                        class="fas fa-eye"></i></a></td>
                                            <td><a href="{{route('admin.portfolio.edit', $portfolio->id)}}"
                                                   class="text-success"><i class="fas fa-pen"></i></a></td>
                                            <td>
                                                <form action="{{route('admin.portfolio.destroy', $portfolio->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
