@extends('layouts.admin')

@section('title')
    Edit Product
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard title">Product</h2>
                <p class="dashboard-subtitle">Edit {{ $product->name }} Product</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')    
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">   
                                            <div class="form-group">
                                                <label for="name">Product Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required />
                                                @if ($errors->has('name'))    
                                                    <p class="text-danger">{{  $errors->first('name') }}</p>  
                                                @endif
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="users_id">User</label>
                                                <select name="users_id" class="form-control" required>
                                                    <option value="{{ $product->users_id }}" selected>{{ $product->user->name }}</option>
                                                    @forelse ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @empty
                                                        <option value="">No Option</option>
                                                    @endforelse 
                                                </select>
                                                @if ($errors->has('users_id'))    
                                                    <p class="text-danger">{{  $errors->first('users_id') }}</p>  
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="categories_id">Category</label>
                                                <select name="categories_id" class="form-control" required>
                                                    <option value="{{ $product->categoriess_id }}" selected>{{ $product->category->name }}</option>
                                                    @forelse ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @empty
                                                        <option value="">No Option</option>
                                                    @endforelse   
                                                </select>
                                                @if ($errors->has('categories_id'))    
                                                    <p class="text-danger">{{  $errors->first('categories_id') }}</p>  
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">   
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" name="price" class="form-control" value="{{ $product->price }}" required />
                                                @if ($errors->has('price'))    
                                                    <p class="text-danger">{{  $errors->first('price') }}</p>  
                                                @endif
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                        
                                                <textarea name="description" id="editor">{{ $product->description }}</textarea>
                                        
                                                @if ($errors->has('description'))    
                                                    <p class="text-danger">{{  $errors->first('description') }}</p>  
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-success px-5">Update Now</button>
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