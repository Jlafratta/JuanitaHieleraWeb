@extends('layouts.dash')

@section('title')
    {{ __(CLIENTS_TITLE) }}    
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
                            <i class="fa fa-users icon-users" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="h1">Modificar cliente</div>
                </div>
            </div>
            
        </div>  {{-- end title --}}   

        <div class="row">

            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                
                                <h5 class="card-title">Cliente</h5>
                                
                            </div> 
                                                      
                        </div>
                        <br>
                        <form action="{{ route('admin.clients.update', $client) }}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="row">

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Nombre <span class="text-danger">*</span></label>
                                    <input value="{{ $client->name }}" type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="province" class="">Provincia <span class="text-danger">*</span></label>
                                    <select type="select" id="province" name="province" class="custom-select">
                                        <option value="">Seleccionar</option>
                                        <option>Value 1</option>
                                        <option>Value 2</option>
                                        <option>Value 3</option>
                                        <option>Value 4</option>
                                        <option>Value 5</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="phoneline" class="">Telefono <span class="text-danger">*</span></label>
                                    <input value="{{ $client->phoneline }}" type="number" name="phoneline" id="phoneline" class="form-control">
                                </div>
                            </div>
                            

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="locality" class="">Localidad <span class="text-danger">*</span></label>
                                    <select type="select" id="locality" name="locality" class="custom-select">
                                        <option value="">Seleccionar</option>
                                        <option>Value 1</option>
                                        <option>Value 2</option>
                                        <option>Value 3</option>
                                        <option>Value 4</option>
                                        <option>Value 5</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="address" class="">Domicilio<span class="text-danger">*</span></label>
                                    <input value="{{ $client->address }}" type="text" name="address" id="address" class="form-control">
                                </div>
                            </div>
                                
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="locality" class="">Vehiculo</label>
                                    <select type="select" id="locality" name="locality" class="custom-select">
                                        @foreach ($client->vehicles() as $vehicle)
                                        <option value="">Seleccionar</option>
                                        @endforeach
                                        
                                        
                                    </select>
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