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
                    <div class="h1">Clientes</div>
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
                                        
                                        <h5 class="card-title">Listado de clientes</h5>
                                    </div>                            
                                </div>
                                
                                <table id="tableSortable" class="mb-0 table-responsive-xl table  table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="cursor-pointer" onclick="sortTable(0)">#</th>
                                        <th class="cursor-pointer" onclick="sortTable(1)">Nombre</th>
                                        <th class="cursor-pointer" onclick="sortTable(2)">Domicilio</th>
                                        <th class="cursor-pointer" onclick="sortTable(3)">Localidad</th>
                                        <th class="cursor-pointer" onclick="sortTable(4)">Provincia</th>
                                        <th>Telefono</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Amanecer</td>
                                        <td>Alberti 1300</td>
                                        <td>Mar del Plata</td>
                                        <td>Buenos Aires</td>
                                        <td>2235997823</td>
                                        <td class="text-center">
                                            <button data-toggle="tooltip" title="Editar" data-placement="top" class="btn btn-primary fa-lg"><i class="pe-7s-config"></i></button> 
                                            <button data-toggle="tooltip" title="Eliminar" data-placement="top" class="btn btn-danger fa-lg"><i class="pe-7s-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Anochecer</td>
                                        <td>La Rioja 2500</td>
                                        <td>Tandil</td>
                                        <td>Buenos Aires</td>
                                        <td>2235458717</td>
                                        <td class="text-center">
                                            <button data-toggle="tooltip" title="Editar" data-placement="top" class="btn btn-primary fa-lg"><i class="pe-7s-config"></i></button> 
                                            <button data-toggle="tooltip" title="Eliminar" data-placement="top" class="btn btn-danger fa-lg"><i class="pe-7s-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Atardecer</td>
                                        <td>Rio Negro 1500</td>
                                        <td>Mar del Plata</td>
                                        <td>C Buenos Aires</td>
                                        <td>2235850258</td>
                                        <td class="text-center">
                                            <button data-toggle="tooltip" title="Editar" data-placement="top" class="btn btn-primary fa-lg"><i class="pe-7s-config"></i></button> 
                                            <button data-toggle="tooltip" title="Eliminar" data-placement="top" class="btn btn-danger fa-lg"><i class="pe-7s-trash"></i></button>
                                        </td>
                                    </tr>
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
                                <div class="d-flex justify-content-between">
                                    <div>
                                        
                                        <h5 class="card-title">Cliente</h5>
                                        
                                    </div> 
                                                              
                                </div>
                                <br>
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Nombre <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control">
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
                                            <input type="number" name="phoneline" id="phoneline" class="form-control">
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
                                            <input type="text" name="address" id="address" class="form-control">
                                        </div>
                                    </div>
                                        
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="locality" class="">Vehiculo</label>
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

                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6 p-">
                                        <button class="btn btn-danger btn-lg btn-block mt-1">Reiniciar</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-success btn-lg btn-block mt-1">Siguiente</button>
                                    </div>
                                </div>

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