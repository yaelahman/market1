@extends('layouts/app')
@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Product</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <div class="text-end upgrade-btn">
                    <a href="{{ route('product.index') }}" class="btn btn-success d-none d-md-inline-block text-white">
                        <i class="fas fa-bars"></i>&nbsp;
                        List Product</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material mx-2" method="post"
                    action="{{ route('product.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Nama</label>
                        <div class="col-md-12">
                            <input type="text" id="name" name="name" value="{{ $product->name }}" required placeholder="Seblak"
                                class="form-control ps-0 form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Kategori</label>
                        <div class="col-md-12">
                            <select name="id_category" id="id_category" class="form-control" required>
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                @foreach ($category as $item)
                                <option value="{{ $item->id }}" {{ $product->id_category == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Deskripsi</label>
                        <div class="col-md-12">
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" value="{{ $product->description }}" required>{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">No WhatsApp</label>
                        <div class="col-md-12">
                            <input type="number" id="whatsapp" name="whatsapp" value="{{ $product->whatsapp }}" required placeholder="0857xxx"
                                class="form-control ps-0 form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Stok Barang</label>
                        <div class="col-md-12">
                            <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required placeholder="0"
                                class="form-control ps-0 form-control-line">
                        </div>
                    </div>
                    <button class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Tambah Gambar Produk</button>
                    <div class="form-group mt-3">
                        <div class="col-sm-12 d-flex">
                            <button class="btn btn-success mx-auto mx-md-0 text-white">Update Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
