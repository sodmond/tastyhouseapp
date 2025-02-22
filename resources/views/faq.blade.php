@extends('layouts.app', ['title' => 'Frequently Asked Questions', 'activePage' => 'faq'])

@section('content')
<!-- Faq Question section Start -->
<section class="faq-contain">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="slider-4-2 product-wrapper">
                    <div>
                        <div class="faq-top-box">
                            <div class="faq-box-icon">
                                <img src="{{ asset('frontend/images/inner-page/faq/start.png') }}" class="blur-up lazyload"
                                    alt="">
                            </div>

                            <div class="faq-box-contain">
                                <h3>Getting Started</h3>
                                <p>Bring to the table win-win survival strategies to ensure proactive domination.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="faq-top-box">
                            <div class="faq-box-icon">
                                <img src="{{ asset('frontend/images/inner-page/faq/help.png') }}" class="blur-up lazyload" alt="">
                            </div>

                            <div class="faq-box-contain">
                                <h3>Sales Question</h3>
                                <p>Lorizzle ipsizzle boom shackalack sit get down get down.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="faq-top-box">
                            <div class="faq-box-icon">
                                <img src="{{ asset('frontend/images/inner-page/faq/price.png') }}" class="blur-up lazyload"
                                    alt="">
                            </div>

                            <div class="faq-box-contain">
                                <h3>Pricing & Plans</h3>
                                <p>Curabitizzle fizzle break yo neck, yall quis fo shizzle mah nizzle fo rizzle.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="faq-top-box">
                            <div class="faq-box-icon">
                                <img src="{{ asset('frontend/images/inner-page/faq/contact.png') }}" class="blur-up lazyload"
                                    alt="">
                            </div>

                            <div class="faq-box-contain">
                                <h3>Support Contact</h3>
                                <p>Gizzle fo shizzle bow wow wow bizzle leo bibendizzle check out this.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Faq Question section End -->

<!-- Faq Section Start -->
<section class="faq-box-contain section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-xl-5">
                <div class="faq-contain">
                    <h2>Frequently Asked Questions</h2>
                    <p>We are answering most frequent questions. No worries if you not find exact one. You can find
                        out more by searching or continuing clicking button below or directly <a
                            href="contact-us.html" class="theme-color text-decoration-underline">contact our
                            support.</a></p>
                </div>
            </div>

            <div class="col-xl-7">
                <div class="faq-accordion">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    How does Tastyhouse Stores work? 
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Tastyhouse Stores is a <span class="fw-bold">zero-commission</span> online marketplace where vendors 
                                        showcase their products and buyers explore and purchase directly. We provide a 
                                        <span class="fw-bold">platform for trading</span>, but we do not handle transactions, deliveries, 
                                        or direct communication between buyers and sellers.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo">
                                    How do buyers make payments for products? 
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>All payments are made directly between the buyer and the seller. Tastyhouse Stores does not 
                                        process or facilitate payments. We recommend buyers and sellers choose 
                                        <span class="fw-bold">Safe and reliable</span> payment methods.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    Does Tastyhouse Stores handle delivery? 
                                    <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>No, we do not offer delivery services. Sellers are responsible for arranging delivery 
                                        with buyers using their preferred shipping or pickup method.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                    What fees do vendors pay to use Tastyhouse Stores? <i class="fa-solid fa-angle-down"></i>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>We operate on a <span class="fw-bold">zero- commission model</span>, meaning sellers 
                                        keep <span class="fw-bold">100% of their earnings</span>.  Vendors only pay a 
                                        <span class="fw-bold">N5,000 monthly service charge</span> to list their products. 
                                        For those who want extra visibility, our <span class="fw-bold">Prime service</span> is available 
                                        as a separate upgrade for enhanced exposure.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Faq Section End -->
@endsection