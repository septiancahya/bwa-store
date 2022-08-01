@extends('layouts.dashboard')

@section('title')
    Store Dasboard Transactions
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard title">Transactions</h2>
                <p class="dashboard-subtitle">
                    Big result start from the small one
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12 mt-2">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    Sell Product
                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                    Buy Product
                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                @forelse ($sellTransactions as $sell)
                                <a href="{{ route('dashboard-transaction-detail', $sell->id) }}" class="card card-list d-block">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                                @if ($sell->product->galleries->count())
                                                    <img
                                                        src="{{ Storage::url($sell->product->galleries->first()->photo) ?? '' }}"
                                                        alt=""
                                                        class="w-75"
                                                    />
                                                @else
                                                    <img src="/images/no-image-found.png" alt="" class="w-75">
                                                @endif
                                            </div>
                                            <div class="col-md-4">{{ $sell->product->name }}</div>
                                            <div class="col-md-3">{{ $sell->transaction->user->name }}</div>
                                            <div class="col-md-3">{{ $sell->created_at }}</div>
                                            <div class="col-md-1 d-none d-md-block">
                                                <img src="/images/dashboard-arrow-right.svg" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @empty
                                    
                                @endforelse
                                
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                @forelse ($buyTransactions as $buy)
                                <a href="{{ route('dashboard-transaction-detail', $sell->id) }}" class="card card-list d-block">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                                @if ($buy->product->galleries->count())
                                                    <img
                                                        src="{{ Storage::url($buy->product->galleries->first()->photo) ?? '' }}"
                                                        alt=""
                                                        class="w-75"
                                                    />
                                                @else
                                                    <img src="/images/no-image-found.png" alt="" class="w-75">
                                                @endif
                                            </div>
                                            <div class="col-md-4">{{ $buy->product->name }}</div>
                                            <div class="col-md-3">{{ $buy->product->user->store_name != NULL ? $buy->product->user->store_name : $buy->product->user->name }}</div>
                                            <div class="col-md-3">{{ $buy->created_at }}</div>
                                            <div class="col-md-1 d-none d-md-block">
                                                <img src="/images/dashboard-arrow-right.svg" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @empty
                                    
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection