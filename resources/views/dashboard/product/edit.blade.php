@extends('layouts.dash')

@section('title')
    {{ __(PRODUCTS_TITLE) }}    
@endsection

@section('css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">

        {{-- TITLE SECTION --}}
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <div class="font-icon-lg">
                            <i class="fa fa-snowflake icon-snow" aria-hidden="true"></i>
                        </div>
                    </div>
                    
                    <div class="h1">Modificar producto</div>
                </div>
            </div>
            
        </div>  {{-- end title --}} 

        <div class="row">

            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                
                                <h5 class="card-title">Producto</h5>
                                
                            </div>             
                        </div>
                        <br>
                        <form action="{{ route('admin.products.update', $product) }}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Nombre <span class="text-danger">*</span></label>
                                    <input value="{{ $product->name }}" type="text" name="name" id="name" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="price" class="">Precio <span class="text-danger">*</span></label>
                                    <input value="{{ $product->price }}" type="number" step="0.01" name="price" id="price" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="description" class="">Descripcion </label>
                                    <input value="{{ $product->description }}" type="text" name="description" id="description" class="form-control">
                                </div>
                            </div>
                        </div>
                        

                        <div class="row d-flex justify-content-center">
                            <div class="col-md-6 p-">
                                <button class="btn btn-danger btn-lg btn-block mt-1" type="reset">Reiniciar</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-success btn-lg btn-block mt-1" type="submit">Siguiente</button>
                            </div>
                        </div>

                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
@endsection