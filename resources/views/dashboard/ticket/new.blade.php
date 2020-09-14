@extends('layouts.dash')

@section('title')
    {{ __(NEW_TICKET_TITLE) }}
@endsection

@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                <form action="{{ route('admin.tickets.store') }}" method="POST">
                    @csrf
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Cliente</h5><br>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="exampleCustomSelect" class="">Nombre</label>
                                    <select type="select" id="clients" name="clientId" class="custom-select">
                                    <option value="Contado">Contado</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id}}">{{ $client->name }}</option>
                                     @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                   <label for="exampleCustomSelect" class="">Vehiculo</label>
                                    <select type="select" id="vehicles" name="vehicleId" class="custom-select">
                                        <option value="">Seleccionar</option>

                                    </select>
                                    <input type="text">
                                </div>
                                {{ csrf_field() }}
                            </div>

                        </div>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Producto</h5><br>

                        <fieldset class="position-relative form-group">
                            @if ($products->isEmpty())
                                <div class="text-center font-italic">No se encontraron productos</div>
                            @else
                            @foreach ($products as $product)
                            <div class="position-relative form-check form-check-inline">
                                <label class="form-check-label" for="prod">
                                    <input id="prod" value="{{ $product->id }}" name="productId" type="radio" class="form-check-input" checked="checked"> {{ $product->name }}
                                </label>
                            </div>
                            @endforeach
                            @endif
                        </fieldset>
                        <div class="text-right">
                            <button type="submit" class="mt-2 btn btn-primary btn-lg">Confirmar</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Balanza</h5><br>
                            <div class="input-group mb-2 form-control-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text ">Bruto</span>
                                </div>
                                <input value="0.0" name="bruto" type="text" class="form-control form-control-lg">
                            </div>
                            <br>
                            <div class="input-group mb-2 form-control-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tara&nbsp;&nbsp;</span>
                                </div>
                                <input value="0.0" name="tara" id="tara" type="text" class="form-control form-control-lg">
                            </div>
                            <br>
                            <div class="input-group mb-2 form-control-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Neto</span>
                                </div>
                                <input value="0.0" name="neto" type="text" class="form-control form-control-lg">
                            </div>

                            <div class="mt-4 divider"></div>
                            <div class="mt-4 pr-4 text-right"><h5>$ 0.0</h6></div>


                    </div>
                </div>
            </form>
            </div>
        </div>

    </div>
</div>

@endsection


@section('javascript')
  <script  src="{{ asset('js/dropdownNewTicket.js') }}">

  </script>

@endsection
