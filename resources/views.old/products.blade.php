@extends('layout.wrapper')
@section('content')
  <section class="ftco-section bg-light">
    <div class="container-fluid">
      <div class="row">
        @foreach ($items as $i)
          <div class="col-sm col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a href="#" class="img-prod"><img class="img-fluid" src="{{asset("img/products/".$i->id.".jpeg")}}" alt="Colorlib Template">
              </a>
              <div class="text py-3 px-3">
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
                <hr>
                <p class="bottom-area d-flex">
                  <a href="/add-to-cart/{{$i->id}}" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                  <a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
                </p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">
            <ul>
              <li><a href="#">&lt;</a></li>
              <li class="active"><span>1</span></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&gt;</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
