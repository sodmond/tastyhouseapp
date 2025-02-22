@extends('layouts.app', ['title' => 'Blog', 'activePage' => 'blog'])

@section('content')
<section class="blog-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-4">
            <div class="col-xxl-9 col-xl-8 col-lg-7 order-lg-2">
                <div class="row g-4">
                    @foreach($blog as $article)
                    <div class="col-12">
                        <div class="blog-box blog-list wow fadeInUp">
                            <div class="blog-image">
                                <img src="{{ asset('storage/blog/image/'.$article->image) }}" class="blur-up lazyload" alt="">
                            </div>

                            <div class="blog-contain blog-contain-2">
                                <div class="blog-label">
                                    <span class="time"><i data-feather="clock"></i> <span>{{ $article->published_at }}</span></span>
                                </div>
                                <a href="{{ route('blog.details', ['id' => $article->id, 'slug' => $article->slug]) }}">
                                    <h3>{{ $article->title }}</h3>
                                </a>
                                <p>
                                    @php echo strip_tags(Illuminate\Support\Facades\Storage::get('public/blog/contents/'.$article->content)); @endphp
                                </p>
                                <button onclick="location.href = '{{ route('blog.details', ['id' => $article->id, 'slug' => $article->slug])}}';" class="blog-button">
                                    Read More <i class="fa-solid fa-right-long"></i></button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <nav class="custom-pagination">
                    {{ $blog->appends($_GET)->links() }}
                </nav>
            </div>

            <div class="col-xxl-3 col-xl-4 col-lg-5 order-lg-1">
                <div class="left-sidebar-box wow fadeInUp">
                    <div class="left-search-box">
                        <div class="search-box">
                            <input type="search" class="form-control" id="exampleFormControlInput1"
                                placeholder="Search....">
                        </div>
                    </div>

                    <div class="accordion left-accordion-box" id="accordionPanelsStayOpenExample">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseFour">Trending Products</button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse collapse show">
                                <div class="accordion-body">
                                    <ul class="product-list product-list-2 border-0 p-0">
                                        <li>
                                            <div class="offer-product">
                                                <a href="shop-left-sidebar.html" class="offer-image">
                                                    <img src="../assets/images/vegetable/product/23.png"
                                                        class="blur-up lazyload" alt="">
                                                </a>

                                                <div class="offer-detail">
                                                    <div>
                                                        <a href="shop-left-sidebar.html">
                                                            <h6 class="name">Meatigo Premium Goat Curry</h6>
                                                        </a>
                                                        <span>450 G</span>
                                                        <h6 class="price theme-color">$ 70.00</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="offer-product">
                                                <a href="shop-left-sidebar.html" class="offer-image">
                                                    <img src="../assets/images/vegetable/product/24.png"
                                                        class="blur-up lazyload" alt="">
                                                </a>

                                                <div class="offer-detail">
                                                    <div>
                                                        <a href="shop-left-sidebar.html">
                                                            <h6 class="name">Dates Medjoul Premium Imported</h6>
                                                        </a>
                                                        <span>450 G</span>
                                                        <h6 class="price theme-color">$ 40.00</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="mb-0">
                                            <div class="offer-product">
                                                <a href="shop-left-sidebar.html" class="offer-image">
                                                    <img src="../assets/images/vegetable/product/26.png"
                                                        class="blur-up lazyload" alt="">
                                                </a>

                                                <div class="offer-detail">
                                                    <div>
                                                        <a href="shop-left-sidebar.html">
                                                            <h6 class="name">Apple Red Premium Imported</h6>
                                                        </a>
                                                        <span>1 KG</span>
                                                        <h6 class="price theme-color">$ 80.00</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne">
                                    Recent Post
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                <div class="accordion-body pt-0">
                                    <div class="recent-post-box">
                                        <div class="recent-box">
                                            <a href="blog-detail.html" class="recent-image">
                                                <img src="../assets/images/inner-page/blog/1.jpg"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="recent-detail">
                                                <a href="blog-detail.html">
                                                    <h5 class="recent-name">Green onion knife and salad placed</h5>
                                                </a>
                                                <h6>25 Jan, 2022 <i data-feather="thumbs-up"></i></h6>
                                            </div>
                                        </div>

                                        <div class="recent-box">
                                            <a href="blog-detail.html" class="recent-image">
                                                <img src="../assets/images/inner-page/blog/2.jpg"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="recent-detail">
                                                <a href="blog-detail.html">
                                                    <h5 class="recent-name">Health and skin for your organic</h5>
                                                </a>
                                                <h6>25 Jan, 2022 <i data-feather="thumbs-up"></i></h6>
                                            </div>
                                        </div>

                                        <div class="recent-box">
                                            <a href="blog-detail.html" class="recent-image">
                                                <img src="../assets/images/inner-page/blog/3.jpg"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="recent-detail">
                                                <a href="blog-detail.html">
                                                    <h5 class="recent-name">Organics mix masala fresh & soft</h5>
                                                </a>
                                                <h6>25 Jan, 2022 <i data-feather="thumbs-up"></i></h6>
                                            </div>
                                        </div>

                                        <div class="recent-box">
                                            <a href="blog-detail.html" class="recent-image">
                                                <img src="../assets/images/inner-page/blog/4.jpg"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="recent-detail">
                                                <a href="blog-detail.html">
                                                    <h5 class="recent-name">Fresh organics brand and picnic</h5>
                                                </a>
                                                <h6>25 Jan, 2022 <i data-feather="thumbs-up"></i></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection