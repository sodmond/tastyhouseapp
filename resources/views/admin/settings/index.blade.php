@extends('admin.layouts.main', ['title' => 'Settings', 'activePage' => 'settings'])

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
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Settings</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->

        <div class="row justify-content-end mb-3">
            <div class="col-auto">
                <button class="btn btn-custom" data-toggle="modal" data-target="#commRate">
                    <i class="fa fa-percent"></i> Rate & Fees</button>
                <a class="btn btn-custom" href="{{ route('admin.settings.shipping') }}">
                    <i class="fa fa-shipping-fast"></i> Shipping</a>
                <a class="btn btn-custom" href="{{ route('admin.settings.bookcat') }}">
                    <i class="fa fa-book-open"></i> Book Categories</a>
            </div>
        </div>

        <div class="row" id="adminList">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-custom">
                        <h4 class="h5 text-white">List of All Administrators</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <a class="btn btn-custom" href="#newAdminSection"><i class="fas fa-plus-circle"></i> New Admin</a>
                            </div>
                        </div>
                        <div class="row" style="max-height:350px; overflow-y:scroll;">
                            <div class="col-md-12">
                                @if (count($errors))
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There are some problems with your input.<br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success"><strong>Success!</strong> {{ session('success') }}</div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Date Created</th>
                                                <th>...</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $row = (isset($_GET['page']) && $_GET['page'] != 1) ? 10*($_GET['page']-1)+1 : 1; ?>
                                            @foreach ($admins as $admin)
                                                <tr>
                                                    <td>{{ $row++ }}</td>
                                                    <td>{{ $admin->firstname }}</td>
                                                    <td>{{ $admin->lastname }}</td>
                                                    <td>{{ $admin->email }}</td>
                                                    <td>{{ \App\Models\Admin::getRoleName($admin->role) }}</td>
                                                    <td>{{ $admin->created_at }}</td>
                                                    <td>
                                                        @if ($admin->id != 1 && Auth::guard('admin')->user()->role != 2)
                                                            <input type="hidden" id="{{'adminName'.$admin->id}}" value="{{$admin->firstname.' '.$admin->lastname}}">
                                                            <input type="hidden" id="{{'deleteAdminUrl'.$admin->id}}" value="{{ route('admin.settings.profile.trash', ['id' => $admin->id]) }}">
                                                            @if ($admin->id != Auth::guard('admin')->id())
                                                                <a class="btn btn-info btn-xs" href="{{ route('admin.settings.profile.edit', ['id' => $admin->id]) }}"><i class="fa fa-edit"></i></a>
                                                                <button class="btn btn-danger btn-xs" id="{{'deleteAdminBtn-'.$admin->id}}">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row" id="newAdminSection">
            <div class="col-12">
                <div class="card shadow my-4">
                    <div class="card-header bg-custom">
                        <h4 class="h5 text-white">Add New Administrator</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <fieldset class="col" {{ (Auth::guard('admin')->user()->role != 1) ? 'disabled' : '' }}>
                                <form class="row" action="{{ route('admin.settings.profile.new') }}" method="post">
                                    @csrf
                                    <div class="col-md-6 my-2">
                                        <div class="form-group">
                                            <label class="form-label">Firstname</label>
                                            <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="form-group">
                                            <label class="form-label">Lastname</label>
                                            <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="form-group">
                                            <label class="form-label">Role</label>
                                            <select class="form-control" name="role" id="role" required>
                                                <option value=""> - - - Choose Admin Role - - - </option>
                                                @foreach ($adminRoles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="form-group">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="form-group">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-custom w-100">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
<div class="modal" id="commRate" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{ route('admin.settings.comm_rate') }}">
            <div class="modal-header">
                <h5 class="modal-title">Set Fees</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label>Commission Rate (%)</label>
                    <input type="number" class="form-control" name="payout_commission" value="{{ $basic_setting->payout_commission }}" required>
                </div>
                <div class="form-group">
                    <label>Author Premium Fee (₦)</label>
                    <input type="number" class="form-control" name="author_premium_fee" value="{{ $basic_setting->author_premium_fee }}" required>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-custom">Save Changes</button>
            </div>
        </form>
    </div>
</div>  
@endsection

@push('custom-scripts')
    <script>
        $('button[id^="deleteAdminBtn"]').click(function() {
            var getBtnId = $(this).attr('id');
            var adminId = getBtnId.split("-")[1];
            var name = $("#adminName"+adminId).val();
            var x = confirm('Do you want to delete this Admin ('+name+')? This process cannot be reversed');
            if (x == true) {
                var url = $('#deleteAdminUrl'+adminId).val();
                window.location.href = url;
            }
        });
    </script>
@endpush