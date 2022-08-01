@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard title">My Products</h2>
                <p class="dashboard-subtitle">Manage it well and get money</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('dashboard-product-create') }}" class="btn btn-success">Add New Products</a
            >
            </div>
        </div>
        <div class="row mt-4">
            @forelse ($products as $product)
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a
                    href="{{ route('dashboard-product-detail', $product->id) }}"
                    class="card card-dashboard-product d-block"
                >
                    <div class="card-body">
                    @if ($product->galleries->count())
                    <img
                        src="{{ Storage::url($product->galleries->first()->photo) ?? '' }}"
                        alt=""
                        class="w-100 mb-2"
                    />
                    @else
                    <img src="/images/no-image-found.png" alt="" class="w-100 mb-2">
                    @endif
                    <div class="product-title">{{ $product->name ?? '' }}</div>
                    <div class="product-category">{{ $product->category->name ?? '' }}</div>
                    </div>
                </a>
              </div>  
            @empty
                <div class="col-12">
                    <p class="text-center">Empty Product</p>
                </div>
            @endforelse
            
                </div>
            </div>
        </div>
    </div>
@endsection