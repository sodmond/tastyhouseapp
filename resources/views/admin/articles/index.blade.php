@extends('admin.layouts.main', ['title' => 'Articles', 'activePage' => 'articles'])

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('author.home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Articles</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Articles</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">List of All Articles</h4>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-end mb-3">
                                <div class="col-auto">
                                    <a class="btn btn-custom" href="{{ route('admin.article.new') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                                </div>
                                <div class="col-12">
                                    @if (count($errors))
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> Error validating data.<br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success" role="alert"><strong>Success!</strong> {{ session('success') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Date Created</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $row = (isset($_GET['page']) && $_GET['page'] != 1) ? 10*($_GET['page']-1)+1 : 1; ?>
                                        @foreach ($articles as $article)
                                            <tr>
                                                <td>{{ $row++ }}</td>
                                                <td><img src="{{ asset('storage/'.$article->image) }}" style="max-width:50px;"></td>
                                                <td>{{ $article->title }}</td>
                                                <td>{{ $article->created_at }}</td>
                                                <td><a class="btn btn-sm btn-success" href="{{ route('admin.article', ['id' => $article->id]) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->

    

</div>
@endsection