@extends('layouts.admin')

@section('title')
    Product Gallery
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard title">Product Gallery</h2>
                <p class="dashboard-subtitle">Add New Product Gallery</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('product-gallery.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="products_id">Product Name</label>
                                                <select name="products_id" class="form-control" required>
                                                    @forelse ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @empty
                                                        <option value="">No Option</option>
                                                    @endforelse 
                                                </select>
                                                @if ($errors->has('products_id'))    
                                                    <p class="text-danger">{{  $errors->first('products_id') }}</p>  
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="photo">Photo</label>
                                                <input type="file" name="photo" class="form-control" required />
                                                @if ($errors->has('photo'))    
                                                    <p class="text-danger">{{  $errors->first('photo') }}</p>  
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-success px-5">Save Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
     <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace("editor");
    </script>
@endpush