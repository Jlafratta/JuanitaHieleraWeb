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
                    
                    <div class="h1">Vehiculos</div>
                </div>
            </div>
            
        </div>  {{-- end title --}}   

        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                    <span>Activos</span>
                </a>
            </li>
            <li class="nav-item">
                <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                    <span>Nuevo</span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 class="card-title mt-2">Listado de vehiculos</h5>
                                    </div>  
                                    <div class="position-relative form-group">
                                        <form action="">
                                            <div class="custom-checkbox custom-control custom-control-inline mb-1">
                                                <select class="form-control" type="text" name="" id="" placeholder="Seleccionar cliente...">
                                                    <option value="">Seleccionar cliente</option>
                                                    <option value="">Amanecer</option>
                                                    <option value="">Anochecer</option>
                                                    <option value="">Atardecer</option>
                                                </select>
                                            </div>
                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                <input class="form-control mr-1" type="text" name="" id="" placeholder="Ingrese patente...">
                                                <button class="btn btn-light btn-icon" type="submit"><i class="fa fa-lg fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>                          
                                </div>
                                
                                
                                <table id="tableSortable" class="mb-0 table-responsive-xl table  table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="cursor-pointer" onclick="sortTable(0)">Patente</th>
                                        <th class="cursor-pointer" onclick="sortTable(1)">Tara</th>
                                        <th class="cursor-pointer" onclick="sortTable(2)">Modelo</th>
                                        <th class="cursor-pointer" onclick="sortTable(3)">Cliente</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if ($vehicles->isEmpty())
                                        </tbody></table> 
                                        <div class="text-center font-italic">No se encontraron vehiculos</div>
                                        @endif
                                        @foreach ($vehicles as $vehicle)
                                        <tr>
                                            <th scope="row">{{ $vehicle->patent }}</th>
                                            <td>{{ $vehicle->tara }}</td>
                                            <td>{{ $vehicle->model }}</td>
                                            <td>{{ '['.$vehicle->client_id.'] '.$vehicle->client_name }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}" data-toggle="tooltip" title="Editar" data-placement="top" class="btn btn-primary fa-lg"><i class="pe-7s-config"></i></a> 
                                            </td>
                                            <td class="text-left">
                                                <form action="{{ route('admin.vehicles.destroy', $vehicle) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-toggle="tooltip" title="Eliminar" data-placement="top" class="btn btn-danger fa-lg"><i class="pe-7s-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
                <div class="row">

                    <div class="col-md-6">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                
                                <form action="{{ route('admin.vehicles.store') }}" method="POST">
                                @csrf

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
                                            <input type="text" name="patent" id="patent" class="form-control" required>
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="tara" class="">Tara <span class="text-danger">*</span></label>
                                            <input type="number" value="0" step="0.01" name="tara" id="tara" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="model" class="">Modelo </label>
                                            <input type="text" name="model" id="model" class="form-control">
                                        </div>
                                    </div>
                                    
        
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="client" >Cliente <span class="text-danger">*</span></label>
                                            <select type="select" id="client" name="clientId" class="custom-select" required>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}">{{ '['.$client->id.'] '. $client->name }}</option>
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

    </div>
</div>

@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
@endsection