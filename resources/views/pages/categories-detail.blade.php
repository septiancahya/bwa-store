@extends('layouts.app')

@section('title')
    {{ $category->name }} | Category Page
@endsection

@section('content')
<div class="page-content page-home">


    <section class="store-new-products">
        <div class="container">

            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>All Products from {{ $category->name }} Category</h5>
                </div>
            </div>
                <div class="row">
                    @php
                        $incrementItem = 0;
                    @endphp
                    @forelse ($products as $item)
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $incrementItem += 100 }}">
                        <a href="{{ route('detail', $item->slug) }}" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="
                                @if ($item->galleries->count())
                                     background-image: url('{{ Storage::url($item->galleries->first()->photo) }}')
                                 @else
                                     background-color: #eee
                                 @endif
                    "></div>
                            </div>

                            <div class="products-text">{{ $item->name }}</div>
                            <div class="products-price">${{ number_format($item->price) }}</div>
                        </a>
                    </div>
                    @empty
                    <div class="col-lg-12 text-center py-4">
                        Products Not Found
                    </div>
                    @endforelse
        
            </div>
        </div>
    </section>
</div>
@endsection