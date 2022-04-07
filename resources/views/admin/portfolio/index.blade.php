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
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Portfolios Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>image</th>
                                        <th>category</th>
                                        <th>Show</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($portfolios as $portfolio)
                                        <tr>
                                            <td>{{ $portfolio->id}}</td>
                                            <td>
                                                <div style="max-width: 400px; max-height: 100px; overflow-y: scroll; margin: 0 auto;">
                                                    {{ $portfolio->title}}
                                                </div>
                                            </td>
                                            <td>
                                                    <img style="width: 100px; height: 100px; object-fit: cover;" src="{{$portfolio->image ? asset('storage/images/'. $portfolio->image) : asset('kd-images/no-image.webp')}}">
                                            </td>
                                            <td>
                                                <a href="{{!empty($portfolio->category->id) ?  route('admin.category.show', $portfolio->category->id) : 'javascript:void(0)'}}">
                                                    {{ !empty($portfolio->category->title) ? $portfolio->category->title : 'no category'}}
                                                </a>
                                            </td>
                                            <td><a class="btn btn-primary" href="{{route('admin.portfolio.show', $portfolio->id)}}"><i
                                                        class="fas fa-eye"></i></a>
                                            </td>
                                            <td><a class="btn btn-primary" href="{{route('admin.portfolio.edit', $portfolio->id)}}"
                                                   class="text-success"><i class="fas fa-pen"></i></a></td>
                                            <td>
                                                <form action="{{route('admin.portfolio.destroy', $portfolio->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash " role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{$portfolios->links()}}
                            </div>
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
