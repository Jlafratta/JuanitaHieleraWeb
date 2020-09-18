@extends('layouts.dash')

@section('title')
    {{ __(USERS_TITLE) }}    
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
                            <i class="fa fa-address-card" aria-hidden="true"></i>
                        </div>
                    </div>
                    
                    <div class="h1">Empleados</div>
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
                                    <div class="d-none d-lg-block">
                                        <h5 class="card-title">Listado de empleados</h5>
                                    </div>              
                                </div>
                                
                                
                                <table id="tableSortable" class="mb-0 table-responsive-sm table  table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th >Nombre</th>
                                        <th >Correo</th>
                                        <th >Cargo</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if ($users->isEmpty())
                                        </tbody></table> 
                                        <div class="text-center font-italic">No se encontraron empleados</div>
                                        @endif

                                        @foreach ($users as $user)
                                        <tr>
                                            <td scope="row">{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role->name }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('admin.users.edit', $user->id) }}" data-toggle="tooltip" 
                                                title="Editar" data-placement="top" class="btn btn-primary fa-lg"><i class="pe-7s-config"></i></a>
                                            </td>
                                            {{-- <td class="text-left">
                                                @if ($user->id != Auth::user()->id)
                                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-toggle="tooltip" title="Eliminar" data-placement="top" class="btn btn-danger fa-lg"><i class="pe-7s-trash"></i></button>
                                                </form>
                                                @endif
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
                                        
                                        <h5 class="card-title">Empleado</h5>
                                        
                                    </div>             
                                </div>
                                <br>
                                <form action="{{ route('admin.users.store') }}" method="POST">
                                    @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="name" class="">Nombre <span class="text-danger">*</span></label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="price" class="">Correo electrónico <span class="text-danger">*</span></label>
                                            
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"><label for="description" class="mb-3">Cargo <span class="text-danger">*</span> <br></label>
                                        <div class="position-relative form-check d-flex justify-content-between mb-3">
                                            @foreach ($roles as $role)
                                                <label for="{{ $role->id }}" class="form-check-label cursor-pointer">
                                                    <input type="radio" value="{{ $role->id }}" name="role" id="{{ $role->id }}" class="form-check-control" required> {{ $role->name }}
                                                </label>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="description" class="">Contraseña <span class="text-danger">*</span> </label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 d-none d-md-block">
                                        <div class="position-relative form-group">
                                            <label for="" style="color: white">-</label>
                                            <button class="btn btn-success btn-lg btn-block fa-lg" type="submit">Guardar <i class="fa fa-check"></i></button>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="description" class="">Confirmar contraseña <span class="text-danger">*</span> </label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="row d-flex justify-content-center">
                                    <div class="col-md-6 p-">
                                        <button class="btn btn-danger btn-lg btn-block mt-1" type="reset">Reiniciar</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-success btn-lg btn-block mt-1" type="submit">Siguiente</button>
                                    </div>
                                </div> --}}
                                <div class="d-md-none mt-1">
                                    <button class="btn btn-success btn-lg btn-block fa-lg" type="submit">Guardar <i class="fa fa-check"></i></button>
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