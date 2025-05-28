@extends('backend.layout.layout')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (!empty($courier->id))
                    @php
                        $routelink = route('panel.couriers.update', $courier->id);
                    @endphp
                @else
                    @php
                        $routelink = route('panel.couriers.store');
                    @endphp
                @endif

                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ $routelink }}" method="POST">
                            @csrf
                            @if (!empty($courier->id))
                                @method('PUT')
                            @endif

                            <div class="card">

                                <div class="card-body">
                                    <div class="row gy-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Ad Soyad</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name', $courier->name ?? '') }}" >
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">E-posta</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email', $courier->email ?? '') }}" >
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Şifre</label>
                                            <input type="password" name="password" class="form-control" >
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Telefon</label>
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ old('phone', $courier->phone ?? '') }}">
                                        </div>
                                    </div>

                                    @if (!empty($courier->id))
                                        <button type="submit"
                                            class="btn btn-success waves-effect waves-light mt-4">Güncelle</button>
                                    @else
                                        <button type="submit"
                                            class="btn btn-success waves-effect waves-light mt-4">Ekle</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
