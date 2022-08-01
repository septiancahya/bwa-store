@extends('layouts.admin')

@section('title')
    User
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard title">User</h2>
                <p class="dashboard-subtitle">Add New User</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    <div class="row">
                                        <div class="col-md-6">   
                                            <div class="form-group">
                                                <label for="name">Full Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required />
                                                @if ($errors->has('name'))    
                                                    <p class="text-danger">{{  $errors->first('name') }}</p>  
                                                @endif
                                                    
                                            </div>
                                        </div>
                                        <div class="col-md-6">   
                                            <div class="form-group">
                                                <label for="email">E-mail</label>
                                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required />
                                                @if ($errors->has('email'))    
                                                    <p class="text-danger">{{  $errors->first('email') }}</p>  
                                                @endif
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">   
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="form-control" value="{{ old('password') }}" required />
                                                @if ($errors->has('password'))    
                                                    <p class="text-danger">{{  $errors->first('password') }}</p>  
                                                @endif
                                                    
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Role</label>
                                                <select name="roles" class="form-control" required>
                                                    <option value="ADMIN">ADMIN</option>
                                                    <option value="USER">USER</option>
                                                </select>
                                                @if ($errors->has('roles'))    
                                                    <p class="text-danger">{{  $errors->first('roles') }}</p>  
                                                @endif
                                            </div>
                                        </div>
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