@extends('admin.layouts.main', ['title' => 'Books', 'activePage' => 'books'])

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
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.books') }}">Books</a></li>
                                <li class="breadcrumb-item active">New book</li>
                            </ol>
                        </div>
                        <h4 class="page-title">New book</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">Add New Book</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <a class="btn btn-custom" href="{{ route('admin.books') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
                                </div>
                                <div class="col-6">&nbsp;</div>
                            </div>
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
                                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                            @endif
                            <form action="" method="POST" class="pt-2" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="author">Author</label>
                                            <select class="form-control" id="author" name="author" required>
                                                <option value="">- - - Select Author - - -</option>
                                                @foreach($authors as $author)
                                                    <option value="{{ $author->id }}" @selected(old('author') == $author->id)>{{ ucwords($author->firstname.' '.$author->lastname) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select class="form-control" id="category" name="category" required>
                                                <option value="">- - - Select Category - - -</option>
                                                @foreach($book_categories as $category)
                                                    <option value="{{ $category->id }}" @selected(old('category') == $category->id)>{{ ucwords($category->title) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="isbn">ISBN</label>
                                            <input class="form-control" type="text" id="isbn" name="isbn" value="{{ old('isbn') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="soft_copy">Soft Copy</label>
                                            <select class="form-control" id="soft_copy" name="soft_copy" required>
                                                <option value="">- - - Select - - -</option>
                                                <option value="1" @selected(old('soft_copy') == true)>Yes</option>
                                                <option value="0" @selected(old('soft_copy') == false)>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price">Hard Copy</label>
                                            <select class="form-control" id="hard_copy" name="hard_copy" required>
                                                <option value="">- - - Select - - -</option>
                                                <option value="1" @selected(old('hard_copy') == true)>Yes</option>
                                                <option value="0" @selected(old('hard_copy') == false)>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price">Price (Soft Copy)</label>
                                            <input class="form-control" type="number" id="price" name="price" value="{{ old('price') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price">Price (Hard Copy)</label>
                                            <input class="form-control" type="number" id="price2" name="price2" value="{{ old('price2') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="stock">Stock <small>(required only if you have a hard copy)</small></label>
                                            <input class="form-control" type="number" id="stock" name="stock" value="{{ old('stock') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pages_number">Number of Pages</label>
                                            <input class="form-control" type="number" id="pages_number" name="pages_number" value="{{ old('pages_number') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="featured">Featured</label>
                                            <select class="form-control" id="featured" name="featured" required>
                                                <option value="1" @selected(old('featured') == true)>Yes</option>
                                                <option value="0" @selected(old('featured') == false)>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="published_at">Published Date</label>
                                            <input class="form-control" type="date" id="published_at" name="published_at" value="{{ old('published_at') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                                            <div id="testDesc"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image">Cover Image</label>
                                            <input class="form-control" type="file" id="image" name="image" required>
                                            <small class="text-info">(Allowed images; .jpg, .png, .jpeg | Max: 512kb | Dimension: 370x500px)</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="book_file">Book File</label>
                                            <input class="form-control" type="file" id="book_file" name="book_file">
                                            <small class="text-info">(Allowed file type; .pdf | Max: 10MB)</small>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-custom my-3 col-12"><i class="fas fa-save"></i> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->
@endsection

@push('custom-scripts')
<script>
    $(document).ready(function() {
        $('textarea').richText();
        //alert(window.location.href);
    });
</script>
@endpush