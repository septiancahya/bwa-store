@extends('layouts.admin')

@section('title')
    Category
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard title">Category</h2>
                <p class="dashboard-subtitle">Edit {{ $category->name }} Category</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                        @csrf
                                    <div class="row">
                                        <div class="col-md-12">   
                                            <div class="form-group">
                                                <label for="name">Category Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required />
                                                @if ($errors->has('name'))    
                                                    <p class="text-danger">{{  $errors->first('name') }}</p>  
                                                @endif
                                                    
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Icon</label>
                                                <input type="file" name="photo" class="form-control" />
                                                @if ($errors->has('photo'))    
                                                    <p class="text-danger">{{  $errors->first('photo') }}</p>  
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
