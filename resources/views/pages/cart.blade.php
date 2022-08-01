@extends('layouts.app')

@section('title')
    Store Cart Page
@endsection

@section('content')
<div class="page-content page-cart">
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="store-cart">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-12 table-responsive">
                    
                    <table class="table table-borderless table-cart">
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Name &amp; Seller</td>
                                <td>Price</td>
                                <td>Menu</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($carts as $cart)
                            <tr>
                                <td style="width: 20%">
                                    @if ($cart->product->galleries->count())
                                     <img src="{{ Storage::url($cart->product->galleries->first()->photo) }}" class="cart-image" />
                                    @else
                                     <div class="products-image" style="background-color: #eee"></div>
                                    @endif
                                    
                                </td>
                                <td style="width: 35%">
                                    <div class="product-title">{{ $cart->product->name }}</div>
                                    <div class="product-subtitle">by {{ $cart->user->store_name }}</div>
                                </td>
                                <td style="width: 35%">
                                    <div class="product-title">${{ number_format($cart->product->price) }}</div>
                                    <div class="product-subtitle">USD</div>
                                </td>
                                <td style="width: 20%">
                                    <form action="{{ route('cart-remove', $cart->id) }}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                    <button type="submit" class="btn btn-remove-cart">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $total += $cart->product->price;
                            @endphp
                                {{-- <tr>
                                    <td>Empty Cart <a href="{{ route('categories') }}" class="btn btn-success btn-sm ml-2">Shopping</a></td>
                                </tr> --}}
                            @endforeach
                            
                          
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                    <hr />
                </div>
                <div class="col-12">
                    <h2 class="mb-4">Shipping Details</h2>
                </div>
            </div>
            <form action="{{ route('checkout') }}" method="POST" id="locations">
                @csrf
                <input type="hidden" name="total_price" value="{{ $total }}">
                <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address_one">Address 1</label>
                            <input type="text" class="form-control" id="address_one" name="address_one" value="Setra Duta Cemara">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address_two">Address 2</label>
                            <input type="text" class="form-control" id="address_two" name="address_two" value="Blok B2 No. 34">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="provinces_id">Province</label>
                            <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                                <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                         <div class="form-group">
                            <label for="regencies_id">Regencies</label>
                            <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                                <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="zip_code">Postal Code</label>
                            <input type="text" class="form-control" id="zip_code" name="zip_code" value="123999">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" value="Indonesia">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Mobile</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="+628 2020 11111">
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-2">Payment Information</h2>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-4 col-md-2">
                    <div class="product-title">$0</div>
                    <div class="product-subtitle">Country Tax</div>
                    </div>
                    <div class="col-4 col-md-3">
                    <div class="product-title">$0</div>
                    <div class="product-subtitle">Product Insurance</div>
                    </div>
                    <div class="col-4 col-md-2">
                    <div class="product-title">$0</div>
                    <div class="product-subtitle">Ship to Jakarta</div>
                    </div>
                    <div class="col-4 col-md-2">
                    <div class="product-title text-success">${{ number_format($total) }}</div>
                    <div class="product-subtitle">Total</div>
                    </div>
                    <div class="col-8 col-md-3">
                    <button type="submit" class="btn btn-success mt-4 px-4 btn-block">Checkout Now</button>
                    </div>
            </div>
            </form>
            
    </section>

</div>
@endsection

@push('after-script')
    <script src="{{ url('/vendor/vue/vue.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      var locations = new Vue({
        el: "#locations",
        mounted() {
          AOS.init();
          this.getProvincesData();
        },
        data: {
          provinces: null,
          regencies: null,
          provinces_id: null,
          regencies_id: null,
        },
        methods: {
            getProvincesData(){
                var self = this;
                axios.get('{{ route('api-provinces') }}')
                    .then(function(response){
                        self.provinces = response.data;
                });
            },
            getRegenciesData(){
                var self = this;
                axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                    .then(function(response){
                        self.regencies = response.data;
                });
            },
        },
        watch: {
            provinces_id: function(val, oldVal)  {
                this.regencies_id = null;
                this.getRegenciesData();
            }
        }
      });
    </script>
@endpush