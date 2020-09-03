@extends('layouts.dash')

@section('title')
    {{ __(NEW_TICKET_TITLE) }}    
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
                            <i class="fa fa-cart-plus " aria-hidden="true"></i>
                        </div>
                    </div>
                    <div>Nuevo ingreso
                        <div class="page-title-subheading">Dar de alta una nueva venta.
                        </div>
                    </div>
                </div>
            </div>
        </div>  {{-- end title --}}   

        {{-- CONTENT --}}
        
        <div class="row">

            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Cliente</h5><br>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="exampleCustomSelect" class="">Nombre</label>
                                    <select type="select" id="exampleCustomSelect" name="customSelect" class="custom-select">
                                        <option value="">Seleccionar</option>
                                        <option>Value 1</option>
                                        <option>Value 2</option>
                                        <option>Value 3</option>
                                        <option>Value 4</option>
                                        <option>Value 5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="exampleCustomSelect" class="">Vehiculo</label>
                                    <select type="select" id="exampleCustomSelect" name="customSelect" class="custom-select">
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
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Producto</h5><br>
                        <form class="">
                            <fieldset class="position-relative form-group">
                                <div class="position-relative form-check form-check-inline">
                                    <label class="form-check-label" for="prod">
                                        <input id="prod" name="radio1" type="radio" class="form-check-input" checked="checked"> Hielo
                                    </label>
                                </div>
                                <div class="position-relative form-check form-check-inline">
                                    <label class="form-check-label" for="prod2">
                                        <input id="prod2" name="radio1" type="radio" class="form-check-input"> Hielin
                                    </label>
                                </div>
                                <div class="position-relative form-check form-check-inline">
                                    <label class="form-check-label" for="prod3">
                                        <input id="prod3" name="radio1" type="radio" class="form-check-input" > Hielete
                                    </label>
                                    
                                </div>
                            </fieldset>
                            <div class="text-right">
                                <button class="mt-2 btn btn-primary btn-lg">Finalizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Balanza</h5><br>
                        <form class="">
                            <div class="input-group mb-2 form-control-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text ">Bruto</span>
                                </div>
                                <input value="0.0" type="text" class="form-control form-control-lg">
                            </div>
                            <br>
                            <div class="input-group mb-2 form-control-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tara&nbsp;&nbsp;</span>
                                </div>
                                <input value="0.0" type="text" class="form-control form-control-lg">
                            </div>
                            <br>
                            <div class="input-group mb-2 form-control-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Neto</span>
                                </div>
                                <input value="0.0" type="text" class="form-control form-control-lg">
                            </div>
                            
                            <div class="mt-4 divider"></div>
                            <div class="mt-4 pr-4 text-right"><h5>$ 0.0</h6></div>
                            
                        </form>
                    </div>
                </div>
            </div>

        </div>
            
        

    </div>
</div>

@endsection