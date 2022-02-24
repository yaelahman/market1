@extends('layouts/app')
@section('content')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">License</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">License</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <div class="text-end upgrade-btn">
                <a href="{{ route('license.index') }}"
                    class="btn btn-success d-none d-md-inline-block text-white">
                    <i class="fas fa-bars"></i>&nbsp;
                    List License</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form class="form-horizontal form-material mx-2" method="post" action="{{ route('license.store') }}">
                @csrf
                <div class="form-group">
                    <label class="col-md-12 mb-0">Name</label>
                    <div class="col-md-12">
                        <input type="text" id="name" name="name" required placeholder="Wallet 1"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12 mb-0">Address</label>
                    <div class="col-md-12">
                        <input type="text" id="address" name="address" required placeholder="0x......."
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label for="duration" class="col-md-12">Duration</label>
                    <div class="col-md-12">
                        <input type="date" placeholder="johnathan@admin.com"
                            class="form-control ps-0 form-control-line" name="duration" required
                            id="duration">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 d-flex">
                        <button class="btn btn-success mx-auto mx-md-0 text-white">Save License</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        $('#address').on('keyup', function() {
            var address = $(this).val();
            if(address.length >= 2) {
                if(address.substr(0,2) == '0x') {
                    $('#address').val(address);
                    console.log(address);
                } else {
                    $('#address').val("0x" + address);
                    console.log(address);
                }
            }
        })
    </script>
@endsection