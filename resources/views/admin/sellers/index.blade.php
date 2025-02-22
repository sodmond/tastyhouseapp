@extends('admin.layouts.main', ['title' => 'All Vendors', 'activePage' => 'vendors'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>Vendors List</h5>
                    </div>
                    <div>
                        <form class="row row-cols-lg-auto g-3 align-items-center justify-content-end mb-4">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Enter vendor's name or email" aria-label="Vendor's name or email" aria-describedby="button-addon2">
                                    <button class="btn btn-theme" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table list-table theme-table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date Created</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($sellers as $seller)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/seller/profile_pix/'.$seller->image) }}" class="img-fluid" alt="" style="max-height:45px;">
                                        </td>
                                        <td>
                                            <div class="user-name">
                                                {{ $seller->firstname.' '.$seller->lastname }}
                                            </div>
                                        </td>
                                        <td>{{ $seller->email }}</td>
                                        <td>
                                            <span>{{ $seller->created_at }}</span>
                                        </td>
                                        <td>
                                            <ul>
                                                <li>
                                                    <a href="{{ route('admin.user', ['id' => $seller->id]) }}">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection