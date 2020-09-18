@extends('layouts.dash')

@section('title')
    {{ __(VEHICLES_TITLE) }}    
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
                            <i class="fa fa-truck icon-users" aria-hidden="true"></i>
                        </div>
                    </div>
                    
                    <div class="h1">Modificar vehiculo</div>
                </div>
            </div>
            
        </div>  {{-- end title --}}  
        
        <div class="row">

            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        
                        <form action="{{ route('admin.vehicles.update', $vehicle) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-between">
                            <div>
                                
                                <h5 class="card-title">Vehiculo</h5>
                                
                            </div>  
                                      
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="patent" class="">Patente <span class="text-danger">*</span></label>
                                    <input value="{{ $vehicle->patent }}" type="text" name="patent" id="patent" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="tara" class="">Tara <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" value="{{ $vehicle->tara }}" name="tara" id="tara" class="form-control" required>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="model" class="">Modelo </label>
                                    <input type="text" value="{{ $vehicle->model }}" name="model" id="model" class="form-control">
                                </div>
                            </div>
                            

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="client">Cliente <span class="text-danger">*</span></label>
                                    <select type="select"  id="client" name="clientId" class="custom-select" disabled required>
                                            <option value="{{ $vehicle->client_id }}">{{ '['.$vehicle->client_id.'] '. $vehicle->client_name }}</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        

                        <div class="mt-1">
                            <button class="float-right btn btn-success btn-lg mt-1 fa-lg" style="width: 47%" type="submit"> Guardar  <i class="fa fa-check"></i></button>
                        </form>
                            <form action="{{ route('admin.products.destroy', $vehicle) }}" method="POST" class="float-left" style="width: 47%">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-lg btn-block mt-1 fa-lg"> Eliminar <i class="fa fa-trash"></i></button>
                            </form>
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