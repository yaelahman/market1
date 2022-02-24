@extends('layouts.app')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Profile</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                @if (Session::has('alert'))
                    <div class="alert alert-{{ Session::get('alert') }}">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2" method="post"
                            action="{{ route('profile.update', ['profile' => $user->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="{{ $user->name }}" disabled
                                        class="form-control ps-0 form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="{{ $user->email }}" disabled
                                        class="form-control ps-0 form-control-line" name="example-email" id="example-email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Password</label>
                                <div class="col-md-12">
                                    <input type="password" id="password" name="password" value=""
                                        class="form-control ps-0 form-control-line">
                                </div>
                                <span class="text-muted">Isi password jika ingin menggantinya</span>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 d-flex">
                                    <button type="submit"
                                        class="btn-update d-none btn btn-success mx-auto mx-md-0 text-white">Update
                                        Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    @endsection
    @section('script')
        <script>
            $('#password').on('keyup', function() {
                if ($(this).val() != '') {
                    $('.btn-update').removeClass('d-none');
                } else {
                    $('.btn-update').addClass('d-none');
                }
            })

        </script>
    @endsection
