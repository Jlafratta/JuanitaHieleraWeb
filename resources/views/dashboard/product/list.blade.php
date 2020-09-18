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
                    
                    <div class="h1">Productos</div>
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
                                        <h5 class="card-title">Listado de productos</h5>
                                    </div>              
                                </div>
                                
                                
                                <table id="tableSortable" class="mb-0 table-responsive-sm table  table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="cursor-pointer" onclick="sortTable(0)">#</th>
                                        <th class="cursor-pointer" onclick="sortTable(1)">Nombre</th>
                                        <th class="cursor-pointer" onclick="sortTable(2)">Descripcion</th>
                                        <th class="cursor-pointer" onclick="sortTable(3)">Precio (kg)</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if ($products->isEmpty())
                                        </tbody></table> 
                                        <div class="text-center font-italic">No se encontraron productos</div>
                                        @endif

                                        @foreach ($products as $product)
                                        <tr>
                                            <th scope="row">{{ $product->id }}</th>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ '$ '. $product->price }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('admin.products.edit', $product->id) }}" data-toggle="tooltip" 
                                                title="Editar" data-placement="top" class="btn btn-primary fa-lg"><i class="pe-7s-config"></i></a>
                                            </td>
                                            {{-- <td class="text-left">
                                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-toggle="tooltip" title="Eliminar" data-placement="top" class="btn btn-danger fa-lg"><i class="pe-7s-trash"></i></button>
                                                </form>
                                                
                                            </td> --}}
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
                                <div class="d-flex justify-content-between">
                                    <div>
                                        
                                        <h5 class="card-title">Producto</h5>
                                        
                                    </div>             
                                </div>
                                <br>
                                <form action="{{ route('admin.products.store') }}" method="POST">
                                    @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Nombre <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control" required>
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="price" class="">Precio <span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="price" id="price" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <div class="position-relative form-group">
                                            <label for="description" class="">Descripcion </label>
                                            <input type="text" name="description" id="description" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="" style="color: white">-</label>
                                            <button class="btn btn-success btn-lg btn-block fa-lg" type="submit">Guardar <i class="fa fa-check"></i></button>
                                        </div>
                                        
                                    </div>
                                </div>
                                

                                {{-- <div class="row d-flex justify-content-center">
                                    
                                    <div class="col-md-6">
                                        <button class="btn btn-success btn-lg btn-block mt-1" type="submit">Siguiente</button>
                                    </div>
                                </div> --}}

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