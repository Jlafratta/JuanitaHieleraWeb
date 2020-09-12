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
                                <form action="{{ route('admin.tickets.index') }}" method="GET">
                                    <div class="custom-control custom-control-inline mb-1">
                                        <select class="form-control" type="text" name="clientId" placeholder="Seleccionar cliente...">
                                            <option value="">Seleccionar cliente</option> 
                                            <option value="0">CONTADO</option> 
                                            @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="custom-control custom-control-inline">
                                        @if(request('dateFilter'))
                                            <input class="form-control mr-1" type="date" name="dateFilter" value="{{ request('dateFilter') }}">
                                        @else
                                            <input class="form-control mr-1" type="date" name="dateFilter">
                                        @endif
                                        <button class="btn btn-light btn-icon" type="submit"><i class="fa fa-lg fa-search"></i></button>
                                    </div>
                                    
                                </form>
                            </div>
                            
                        </div>
                        
                        <table id="tableSortable" class="mb-0 table-responsive-sm table  table-striped table-hover">
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
                                @if ($tickets->isEmpty())
                                    </tbody></table> 
                                    <div class="text-center font-italic">No se encontraron tickets</div>
                                @else   
                                {{-- {{ $tickets }}    --}}
                                @foreach ($tickets as $ticket)
                                <tr>
                                    <th scope="row">{{ $ticket->idCompound }}</th>
                                    <td>{{ $ticket->date->format('d/m/Y') }}</td>
                                    <td>{{ $ticket->date->format('H:i:s') }}</td>
                                    <td>{{ $ticket->patent }}</td>
                                    <td>{{ $ticket->client_name }}</td>
                                    <td>{{ $ticket->neto }}</td>
                                    <td class="text-center">
                                        <button data-toggle="tooltip" title="Imprimir" data-placement="top" class="btn btn-primary  fa-lg"><i class=" pe-7s-print"></i></button> 
                                        {{-- <button data-toggle="tooltip" title="Eliminar" data-placement="top" class="btn btn-danger fa-lg"><i class="pe-7s-trash"></i></button> --}}
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table><br>
                        <div class="d-flex justify-content-center pagination ">{{ $tickets->render() }}</div>
                        
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