@extends('layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="card">
        <div class="col-md">
    
            <div class="card-body">
                <h2>Latihan Tes Laravel</h2>
            </div>
            <div class="card-body">
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#product_create">Create Product</button>
                {{-- <a href="" class="btn btn-sm btn-primary">Create Product</a> --}}
            </div>
            {{-- Alert --}}
            @if(session('success'))
                <div class="alert alert-info" role="alert">
                    <div class="alert-body">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product_id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    @php 
                        $no= +1;
                    @endphp
                </thead>
                <tbody>
                    @foreach($product as $item) 
                        <tr>
                            <td scope="row">{{ $no++ }}</td>
                            <td>{{ $item->product_id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category }}</td>
                            <td>Rp.{{ number_format($item['price'],0,',','.') }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item['created_at'] }}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('product.destroy', $item->id) }}" method="POST">
                                    @csrf 
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


{{-- Modal insert --}}
<div class="modal fade" id="product_create" tabindex="-1" aria-labelledby="modal_product" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_product">Create Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ action('ProductController@store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Product ID</label>
                        <input type="text" name="product_id" class="form-control @error('product_id') is-invalid @enderror" value="{{ old('product_id') }}" required>
    
                        @error('product_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
    
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}" required>
    
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
    
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description')}}" required autocomplete="description" autofocus></textarea>
        
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>  



@endsection