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
                    
                    <div class="h1">Modificar usuario</div>
                </div>
            </div>
            
        </div>  {{-- end title --}} 

        {{-- <div class="row">

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
        </div> --}}
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
                        <form action="{{ route('admin.users.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Nombre <span class="text-danger">*</span></label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

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
                                    
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

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
                                            @if($user->role_id == $role->id)
                                                <input type="radio" value="{{ $role->id }}" name="role" id="{{ $role->id }}" class="form-check-control" required checked> {{ $role->name }}
                                            @else
                                                <input type="radio" value="{{ $role->id }}" name="role" id="{{ $role->id }}" class="form-check-control" required> {{ $role->name }}
                                            @endif
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group text-center mt-3">
                                    <a href="#">Cambiar contraseña</a>
                                    {{-- <label for="description" class="">Contraseña <span class="text-danger">*</span> </label>
                                    <input id="password" value="{{ $user->password }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="description" class="">Confirmar contraseña <span class="text-danger">*</span> </label>
                                    <input id="password-confirm" value="{{ $user->password }}" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div> --}}

                        <div class="mt-1">
                            <button class="float-right btn btn-success btn-lg mt-1 fa-lg" style="width: 47%" type="submit"> Guardar  <i class="fa fa-check"></i></button>
                        </form>

                        <div class="float-left" style="width: 47%; color: white">
                            <a class="btn btn-danger btn-lg btn-block mt-1 fa-lg" data-toggle="modal" data-target="#deleteModal"> Eliminar <i class="fa fa-trash"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar empleado {{ $user->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Esta seguro que desea eliminar al usuario del sistema? <br>
                        No podrá revertir los cambios.
                </p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="margin-block-end: 0em;">
                    @csrf
                    @method('DELETE')
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary btn-lg fa-lg" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-danger btn-lg fa-lg ml-2"> Eliminar </button>
                    </div>

                    

                </form>
            </div>
        </div>
    </div>
</div>

@section('javascript')
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
@endsection