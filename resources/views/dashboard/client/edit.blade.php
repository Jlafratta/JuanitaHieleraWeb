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
                            {{-- <div class="text-left">
                                <form action="{{ route('admin.clients.destroy', $client) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button data-toggle="tooltip" title="Eliminar" data-placement="top" class="btn btn-danger fa-lg"><i class="pe-7s-trash"></i></button>
                                </form>
                            </div>                    --}}
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
                                    <label for="address" class="">Domicilio <span class="text-danger">*</span></label>
                                    <input value="{{ $client->address }}" type="text" name="address" id="address" class="form-control">
                                </div>
                            </div>
                                
                            <div class="col-md-6">
                                <label for="address" class="">Estado <span class="text-danger">*</span></label>
                                <div class="position-relative form-check d-flex justify-content-between m-2">
                                    <label for="active" class="form-check-label cursor-pointer">
                                        
                                        <input type="radio" value="0" name="debt" id="active" class="form-check-control" required checked> Activo
                                        
                                    </label>
                                    <label for="debt" class="form-check-label cursor-pointer mr-3">
                                        @if($client->debtor)
                                            <input type="radio" value="1" name="debt" id="debt" class="form-check-control" required checked> Deudor
                                        @else
                                            <input type="radio" value="1" name="debt" id="debt" class="form-check-control" required > Deudor
                                        @endif
                                    </label>
                                </div>
                            </div>
                            
                        </div>
                        <div class="mt-1">
                            <button class="float-right btn btn-success btn-lg mt-1 fa-lg" style="width: 47%" type="submit"> Guardar  <i class="fa fa-check"></i></button>
                        </form>

                           <div class="float-left" style="width: 47%; color: white">
                                <a class="btn btn-danger btn-lg btn-block mt-1 fa-lg" data-toggle="modal" data-target="#deleteModal"> Eliminar <i class="fa fa-trash"></i></a>
                           </div>
                        </div>

                    </div>
                    
                </div>
            </div>
            

        </div>



    </div>
</div>

@endsection

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar cliente {{ $client->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Esta seguro que desea eliminar al cliente del sistema? <br>
                        Se eliminaran sus correspondientes vehiculos registrados. <br> 
                        Los tickets y la contabilidad no se veran afectados.
                </p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.clients.destroy',$client) }}" method="POST" style="margin-block-end: 0em;">
                    @csrf
                    @method('DELETE')
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary btn-lg fa-lg" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-danger btn-lg btn-block fa-lg ml-2"> Eliminar </button>
                    </div>

                    

                </form>
            </div>
        </div>
    </div>
</div>


@section('javascript')
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
@endsection