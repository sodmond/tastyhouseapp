@extends('layouts.app', ['title' => 'Vendor Dashboard', 'activePage' => 'seller.products'])

@section('content')
<section class="user-dashboard-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-3 col-lg-4">
                @include('seller.layouts.sidebar', ['activePage' => 'seller.products'])
            </div>

            <div class="col-xxl-9 col-lg-8">
                <div class="dashboard-right-sidebar">
                    <div class="product-tab">
                        <div class="title">
                            <h2>My Products</h2>
                            <span class="title-leaf">
                                <svg class="icon-width bg-gray">
                                    <use xlink:href="{{ asset('frontend/svg/leaf.svg#leaf') }}"></use>
                                </svg>
                            </span>
                        </div>

                        <div class="table-responsive dashboard-bg-box">
                            <div class="dashboard-title dashboard-flex">
                                <h3>Product List</h3>
                                <button class="btn btn-sm theme-bg-color text-white">
                                    <a class="text-white" href="{{ route('seller.product.new') }}">
                                        <i class="fa fa-plus-circle"></i> Add New
                                    </a>
                                </button>
                            </div>
                            <table class="table product-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Images</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td class="product-image">
                                            @php $thumbnail = json_decode($product->image)[0]; @endphp
                                            <img src="{{ asset('storage/products/'.auth('seller')->id().'/thumbnail/'.$thumbnail) }}" class="img-fluid" alt="">
                                        </td>
                                        <td>
                                            <h6>{{ $product->title }}</h6>
                                        </td>
                                        <td>
                                            <h6 class="theme-color fw-bold">
                                                {{ ($product->price_type == 'call_for_price') ? 'Call for Price' : $currency.number_format($product->price, 2) }}</h6>
                                        </td>
                                        <td class="edit-delete">
                                            <a href="{{ route('seller.product.edit', ['id' => $product->id]) }}"><i data-feather="edit" class="edit"></i></a>
                                            <a href=""><i data-feather="trash-2" class="delete"></i></a>
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
</section>
<input type="hidden" id="getStateCitiesLink" value="{{ url('/get-state-city') }}">
@endsection

@push('custom-script')
    <script>
        $(document).ready(function(){
            $('#state').change(function() {
                let state_id = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: $('#getStateCitiesLink').val() + '/' + state_id,
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            let cities = '<option value="">- - - Select City</option>';
                            data.cities.forEach(element => {
                                cities += '<option value="' + element.id + '">' + element.name + '</option>';
                            });
                            $('#city').html(cities);
                        }
                    }
                });
            });
        });
    </script>
@endpush