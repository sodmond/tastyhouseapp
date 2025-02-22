@extends('admin.layouts.main', ['title' => 'All Users', 'activePage' => 'users'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>Users List</h5>
                    </div>

                    <div class="table-responsive table-product">
                        <form class="row row-cols-lg-auto g-3 align-items-center justify-content-end mb-4">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Enter user's name or email" aria-label="User's name or email" aria-describedby="button-addon2">
                                    <button class="btn btn-theme" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                        <table class="table all-package theme-table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/user/profile_pix/'.$user->image) }}" class="img-fluid" alt="" style="max-height:45px;">
                                    </td>

                                    <td>
                                        <div class="user-name"><span>{{ $user->firstname }}</span></div>
                                    </td>

                                    <td>
                                        <div class="user-name"><span>{{ $user->lastname }}</span></div>
                                    </td>

                                    <td>{{ $user->email }}</td>

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{ route('admin.user', ['id' => $user->id]) }}">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalToggle">
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pt-4">{{ $users->appends($_GET)->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection