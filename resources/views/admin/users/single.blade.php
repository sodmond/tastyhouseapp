@extends('admin.layouts.main', ['title' => 'User Details', 'activePage' => 'users'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>User Details</h5>
                        <div class="right-options">
                            <ul>
                                <li>
                                    <a class="btn btn-sm btn-custom" role="button" href="{{ route('admin.users') }}">
                                        <i class="fa fa-arrow-left"></i> Back</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('storage/user/profile_pix/'.$user->image) }}" class="img-fluid" alt="">
                            <div class="my-3">
                                <a href="{{ route('admin.user', ['id' => $user->id]) }}">
                                    <button class="btn btn-danger"><i class="fas fa-ban"></i> &nbsp; Ban</button>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="table-responsive table-product">
                                <table class="table all-packag theme-tabl" >
                                    <tbody>
                                        <tr>
                                            <th>Firstname</th>
                                            <td>
                                                <div class="user-name"><span>{{ $user->firstname }}</span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Lastname</th>
                                            <td><div class="user-name">{{ $user->lastname }}</div></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>{{ $user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date Created</th>
                                            <td>{{ $user->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Updated</th>
                                            <td>{{ $user->updated_at }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection