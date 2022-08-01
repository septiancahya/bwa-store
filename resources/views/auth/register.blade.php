@extends('layouts.auth')

@section('content')

<div class="page-content page-auth" id="register">
    <section class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center justify-content-center row-login">

            <div class="col-lg-4">
                <h2>
                    Memulai untuk jual beli <br />
                    dengan cara terbaru
                </h2>

                <form method="POST" action="{{ route('register') }}" class="mt-3">
                        @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input id="name" type="text" v-model="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" v-model="email" @change="checkForEmailAvailability()" class="form-control @error('email') is-invalid @enderror" :class="{ 'is-invalid' : this.email_unavailable }" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                       <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <label>Store</label>
                        <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
                        <div
                            class="custom-control custom-radio custom-control-inline"
                        >
                            <input
                            type="radio"
                            class="custom-control-input"
                            name="is_store_open"
                            id="openStoreTrue"
                            v-model="is_store_open"
                            :value="true"
                            />
                            <label for="openStoreTrue" class="custom-control-label"
                            >Iya, boleh</label
                            >
                        </div>

                        <div
                            class="custom-control custom-radio custom-control-inline"
                        >
                            <input
                            type="radio"
                            class="custom-control-input"
                            name="is_store_open"
                            id="openStoreFalse"
                            v-model="is_store_open"
                            :value="false"
                            />
                            <label for="openStoreFalse" class="custom-control-label"
                            >Enggak, makasih</label
                            >
                        </div>
                    </div>

                    <div class="form-group" v-if="is_store_open">
                        <label for="store_name">Nama Toko</label>
                        <input type="text" v-model="store_name" id="store_name" class="form-control @error('store_name') is-invalid @enderror" name="store_name" value="{{ old('store_name') }}" required autocomplete autofocus>
                        @error('store_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group" v-if="is_store_open">
                        <label for="categories_id">Kategori</label>
                        <select name="categories_id" id="" class="form-control">
                            <option value="" disabled>Select Category</option>
                            @forelse ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @empty
                                
                            @endforelse
                        </select>
                        @error('categories_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button
                    type="submit"
                    class="btn btn-success btn-block mt-4"
                    :disabled="this.email_unavailable"
                    >
                    Sign Up Now
                    </button>
                            <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">
                    Back to Sign In
                    </a>
                </form>

            </div>
            </div>
        </div>
    </section>
</div>

<div class="container" style="display: none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        Vue.use(Toasted);

        var register = new Vue({
            el: "#register",
            mounted() {
                AOS.init();
            },
            methods: {
                checkForEmailAvailability: function() {
                    var self = this;
                    axios.get('{{ route('api-register-check') }}', {
                        params: {
                            email: this.email
                        }
                    })
                    .then(function (response) {
                        if(response.data == 'Available') {
                            self.$toasted.show (
                                "Email anda tersedia! Silahkan lanjut ke tahap berikutnya!",
                            {
                                position: "top-center",
                                className: "rounded",
                                duration: 1000,
                            }
                            );
                            self.email_unavailable = false ;
                        } else {
                            self.$toasted.show (
                                "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
                            {
                                position: "top-center",
                                className: "rounded",
                                duration: 1000,
                            }
                            );
                            self.email_unavailable = true ;
                        }
                        
                        console.log(response);
                    });                        
                }
            },
            data: {
                name: "Angga Hazza Sett",
                email: "kamujagoan@bwa.id",
                is_store_open: true,
                store_name: "",
                email_envailable: false,
            },
        });
    </script>
@endpush
