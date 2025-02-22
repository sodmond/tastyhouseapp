@extends('admin.layouts.main', ['title' => 'Product Details', 'activePage' => 'products'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>Product Details</h5>
                        <div class="right-options">
                            <ul>
                                <li>
                                    <a class="btn btn-sm btn-custom" role="button" href="{{ route('admin.products') }}">
                                        <i class="fa fa-arrow-left"></i> Back</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            @php $thumbnail = json_decode($product->image)[0]; @endphp
                            <img src="{{ asset('storage/products/'.$product->seller_id.'/thumbnail/'.$thumbnail) }}" class="img-fluid" alt="">
                            <div class="my-3">
                                <a href="{{ route('admin.product', ['id' => $product->id]) }}">
                                    <button class="btn btn-sm btn-info"><i class="ri-edit-line"></i></button>
                                </a>
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                                    <button class="btn btn-sm btn-danger"><i class="ri-delete-bin-line"></i></button>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="table-responsive table-product">
                                <table class="table all-packag theme-tabl" >
                                    <tbody>
                                        <tr>
                                            <th>Title</th>
                                            <td>
                                                <div class="user-name"><span>{{ $product->title }}</span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <td>{{ ucwords(strtolower($product->category->title)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Vendor</th>
                                            <td>
                                                <a href="">
                                                    <u>{{ $product->seller->firstname.' '.$product->seller->lastname }}</u>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Condition</th>
                                            <td>{{ ucwords($product->condition) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Price Type</th>
                                            <td>{{ ucwords(str_replace('_', ' ', $product->price_type)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td>{{ $currency.number_format($product->price, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Location</th>
                                            <td>{{ \App\Models\State::find($product->city->state_id)->name .', '. ucwords($product->city->name) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date Created</th>
                                            <td>{{ $product->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Updated</th>
                                            <td>{{ $product->updated_at }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12 my-3 pt-3" style="border-top: 1px solid #eaeaea;">
                            <h3 class="mb-3">Description</h3>
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="col-md-12 my-3 pt-3" style="border-top: 1px solid #eaeaea;">
                            <h3 class="mb-3">Product Images</h3>
                            <div class="row">
                                @php $productImages = json_decode($product->image); @endphp
                                @foreach ($productImages as $image)
                                    <div class="col-md-4">
                                        <img class="img-fluid" src="{{ asset('storage/products/'.$product->seller_id.'/'.$image) }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection