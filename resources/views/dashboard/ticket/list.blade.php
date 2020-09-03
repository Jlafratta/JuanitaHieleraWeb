@extends('layouts.dash')

@section('title')
    {{ __(TICKETS_TITLE) }}    
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
                            <i class="fa fa-list-ol " aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="h1">Tickets</div>
                </div>
            </div>
            
        </div>  {{-- end title --}}   

        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title mt-2">Listado de tickets</h5>
                            </div>
                            <div class="position-relative form-group">
                                <form action="">
                                    <div class="custom-control custom-control-inline mb-1">
                                        <select class="form-control" type="text" name="" id="" placeholder="Seleccionar cliente...">
                                            <option value="">Seleccionar cliente</option>
                                            <option value="">Amanecer</option>
                                            <option value="">Anochecer</option>
                                            <option value="">Atardecer</option>
                                        </select>
                                    </div>
                                    <div class="custom-control custom-control-inline">
                                        <input class="form-control mr-1" type="date" name="" id="">
                                        <button class="btn btn-light btn-icon" type="submit"><i class="fa fa-lg fa-search"></i></button>
                                    </div>
                                    
                                </form>
                            </div>
                            
                        </div>
                        
                        <table id="tableSortable" class="mb-0 table-responsive-xl table  table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="cursor-pointer" onclick="sortTable(0)">Ticket</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th class="cursor-pointer" onclick="sortTable(3)">Patente</th>
                                <th class="cursor-pointer" onclick="sortTable(4)">Cliente</th>
                                <th>Peso neto</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">W-1</th>
                                <td>27/08/2020</td>
                                <td>23:47:50</td>
                                <td>FOV212</td>
                                <td>Empresa Ejemplo S.A.</td>
                                <td>1500</td>
                                <td class="text-center">
                                    <button data-toggle="tooltip" title="Imprimir" data-placement="top" class="btn btn-primary  fa-lg"><i class=" pe-7s-print"></i></button> 
                                    <button data-toggle="tooltip" title="Eliminar" data-placement="top" class="btn btn-danger fa-lg"><i class="pe-7s-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">W-2</th>
                                <td>28/08/2020</td>
                                <td>10:20:35</td>
                                <td>FOV212</td>
                                <td>Empresa Ejemplo S.A.</td>
                                <td>1250</td>
                                <td class="text-center">
                                    <button data-toggle="tooltip" title="Imprimir" data-placement="top" class="btn btn-primary  fa-lg"><i class=" pe-7s-print"></i></button> 
                                    <button data-toggle="tooltip" title="Eliminar" data-placement="top" class="btn btn-danger fa-lg"><i class="pe-7s-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">W-3</th>
                                <td>29/08/2020</td>
                                <td>15:47:23</td>
                                <td>AA22BB</td>
                                <td>Cliente Ejemplo </td>
                                <td>740</td>
                                <td class="text-center">
                                    <button data-toggle="tooltip" title="Imprimir" data-placement="top" class="btn btn-primary  fa-lg"><i class=" pe-7s-print"></i></button> 
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
</div>

@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
@endsection