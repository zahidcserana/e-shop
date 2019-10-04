@extends('front.layout.master')
@section('header_js')
    @parent
    <script>
        function addToCart(id,price) {
            $.ajax({
                url: "{{ route('add_to_cart') }}",
                type: 'POST',
                data: {_token: "{{ csrf_token() }}", product_id: id,price:price},
                success: function (response) {
                    var response = $.parseJSON(response);
                    if (response.success) {
                        swal({
                            title: "Successfully added"
                        });
                    }
                }
            });
        }
    </script>
@endsection
@section('front_content')
<!--================Categories Banner Area =================-->
    <section class="categories_banner_area">
          <div class="container">
              <div class="c_banner_inner">
                  <h3>shop grid with left sidebar</h3>
                  <ul>
                      <li><a href="#">Home</a></li>
                      <li><a href="#">Shop</a></li>
                      <li class="current"><a href="#">Shop Grid with Left Sidebar</a></li>
                  </ul>
              </div>
          </div>
      </section>
        <!--================End Categories Banner Area =================-->

    <!--================Categories Product Area =================-->
    <section class="categories_product_main p_80">
        <div class="container">
            <div class="categories_main_inner">
                <div class="row row_disable">
                    <div class="col-lg-12 float-md-right">
                        <div class="showing_fillter">
                            <div class="row m0">
                                <div class="first_fillter">
                                    <h4>Showing {{$from}} to {{$to}} of {{$total}} total</h4>
                                </div>
                            </div>
                        </div>
                        <div class="categories_product_area">
                            <div class="row">
                                @foreach($products as $product)
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
                                                <a href="{{route('view_product',$product->id)}}">
                                                    <img style="height: 150px" src="{{ $product->image }}" alt="">
                                                </a>
                                                <h5 class="new">New</h5>
                                            </div>
                                            <div class="l_p_text">
                                                <ul>
                                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a>
                                                    </li>
                                                    <li><a class="add_cart_btn" onclick="addToCart('{{$product->id}}','{{$product->price}}')"
                                                           href="javascript:void(0);">Add ToCart</a></li>
                                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a>
                                                    </li>
                                                </ul>
                                                <h4> {{ $product->name }} </h4>
                                                <h5> {{ $product->price }} </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <nav aria-label="Page navigation example" class="pagination_area">
                                <ul class="pagination">
                                    {{ $products->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
