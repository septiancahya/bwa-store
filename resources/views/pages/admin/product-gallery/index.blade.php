@extends('layouts.admin')

@section('title')
    Product Gallery
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard title">Product Gallery</h2>
                <p class="dashboard-subtitle">All List of Product Gallery</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('product-gallery.create') }}" class="btn btn-primary mb-3">+ Add Product Gallery</a>
                                <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Product Name</td>
                                            <td>Photo</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbdoy></tbdoy>
                                </table>
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
    <script>
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'product.name', name: 'name' },
                    { data: 'photo', name: 'photo' },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searcable: false,
                        width: '15%'
                    },
            ]
        });
    </script>
@endpush