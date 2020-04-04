@extends('layout.wrapper')
@section('content')
  <div class="hero-wrap js-fullheight" style="background-image: url('{{asset('img/hiking.webp')}}');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
        <h3 class="v">Sales & Rent Camping & Hiking Equipment</h3>
        {{-- <h3 class="vr">Since - 1985</h3> --}}
        <div class="col-md-11 ftco-animate text-center">
          <h1>Jannu</h1>
          <h2><span>Outdoor Shop</span></h2>
        </div>
        <div class="mouse">
          <a href="#" class="mouse-icon">
            <div class="mouse-wheel"><span class="ion-ios-arrow-down"></span></div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="goto-here"></div>

  <section class="ftco-section ftco-product">
    <div class="container">
      <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <h1 class="big">Trending</h1>
          <h2 class="mb-4">Trending</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="product-slider owl-carousel ftco-animate">
            @foreach ($items->slice(0, 5) as $i)
              <div class="item">
                <div class="product">
                  <a href="#" class="img-prod">
                    <img class="img-fluid" src="{{asset('img/products/'.$i->id.'.jpeg')}}" alt="{{$i->name}}">
                  </a>
                  <div class="text pt-3 px-3">
                    <h3><a href="#">{{$i->name}}</a></h3>
                    <div class="d-flex">
                      <div class="pricing">
                        <p class="price"><span class="price-sale">Rp. {{number_format($i->price,0,',','.')}},-</span></p>
                      </div>
                      <div class="rating">
                        <p class="text-right">
                          <span class="ion-ios-star-outline"></span>
                          <span class="ion-ios-star-outline"></span>
                          <span class="ion-ios-star-outline"></span>
                          <span class="ion-ios-star-outline"></span>
                          <span class="ion-ios-star-outline"></span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{asset('img/hiking-portrait.jpeg')}}');">
          <a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
            <span class="icon-play"></span>
          </a>
        </div>
        <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
          <div class="heading-section-bold mb-5 mt-md-5">
            <div class="ml-md-0">
              <h2 class="mb-4">Jannu <br>Outdoor <br> <span>Rent & Shop</span></h2>
            </div>
          </div>
          <div class="pb-md-5">
            <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
            <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
