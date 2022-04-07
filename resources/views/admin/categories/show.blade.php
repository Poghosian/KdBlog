@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content mt-3" >
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="display: flex; align-items: center;">
                                <h3 class="card-title mr-3">Category</h3>
                                <a class="btn btn-primary mr-3" href="{{route('admin.category.edit', $category->id)}}"
                                       class="text-success"><i class="fas fa-pen"></i></a>
                                    <form action="{{route('admin.category.destroy', $category->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-modal">
                                            <i class="fas fa-trash " role="button"></i>
                                        </button>
                                    </form>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>image</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $category->id}}</td>
                                            <td>{{ $category->title}}</td>
                                            <td>
                                                <img style="width: 100px;" src="{{$category->image ? asset('storage/images/'. $category->image) : asset('kd-images/no-image.webp')}}">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
