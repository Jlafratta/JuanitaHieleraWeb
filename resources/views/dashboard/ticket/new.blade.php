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
                                <label class="form-check-label" for="prod{{ $product->id }}">
                                    <input id="prod{{ $product->id }}" value="{{ $product->id }}" name="productId" type="radio" class="form-check-input" checked="checked"> {{ $product->name }}
                                </label>
                            </div>
                            @endforeach
                            @endif
                        </fieldset>
                        <div class="d-none d-md-block text-right ">
                            <button type="submit" class="mt-2 btn btn-primary btn-lg fa-lg">Continuar <i class="fa fa-angle-double-right"></i></button>
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
                                <input value="0.0" name="bruto" id="bruto" type="text" class="form-control form-control-lg" required>
                            </div>
                            <br>
                            <div class="input-group mb-2 form-control-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tara&nbsp;&nbsp;</span>
                                </div>
                                <input value="0.0" name="tara" id="tara" type="text" class="form-control form-control-lg" required>
                            </div>
                            <br>
                            <div class="input-group mb-2 form-control-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Neto</span>
                                </div>
                                <input value="0.0" name="neto" id="neto" type="text" class="form-control form-control-lg" required>
                            </div>

                            <div class="mt-4 divider"></div>
                            <div class="mt-4 pr-4 text-right"><h5>$ 0.0</h6></div>

                            <div class="d-md-none text-right ">
                                <button type="submit" class="mt-2 btn btn-primary btn-lg fa-lg">Continuar <i class="fa fa-angle-double-right"></i></button>
                            </div>
                    </div>

                </div>
            </form>
            </div>
        </div>

    </div>
</div>
<div id="ticketPdf" style="display: none;height: 50%;">
    <div class="example">
     <h3 style="text-align: center;" id="ticketIdPdf">
       Ticket:11111
     </h3>


     <h5 style="margin-left:80%;" >Comprobante de pago <br> para uso interno </h5>
         <h3 >
           <DIV style="float:left" id="productoPdf">
            Producto:HIELO ESCAMA
           </DIV>
           <div style="float:right " id="pesoBrutoPdf">
            Peso Bruto:100000
           </div>
         </h3>
       <br>
        <h3>
          <DIV style="float:left" id="clientePdf">
            Cliente:FRIGORIFICO DEL SUR Y ANTAR
          </DIV>
          <div style="float:right " id="taraPdf">
            Tara:100000
          </div>
        </h3>
        <br>
          <h3>
            <DIV style=" float:left" id="patentePdf">
              Patente:1234567
            </DIV>
            <div style="float:right " id="pesoNetoPdf">
              Peso Neto:100000
            </div>
          </h3>
          <br><br><br>

          <br>
          <h3 >
            <DIV style=" float:left" id="fechaPdf">
              Fecha:00/00/0000
            </DIV>
            <div style=" float:right " >
              Firma:.........................
            </div>
          </h3>


          <br><br>
          <h3 style="text-align: center;" id="ticketIdPdf">
            Ticket:11111
          </h3>


          <h5 style="margin-left:80%;" >Comprobante de pago <br> para uso interno </h5>
         <h3 >
           <DIV style="float:left" id="productoPdf">
            Producto:HIELO ESCAMA
           </DIV>
           <div style="float:right " id="pesoBrutoPdf">
            Peso Bruto:100000
           </div>
         </h3>
       <br>
        <h3>
          <DIV style="float:left" id="clientePdf">
            Cliente:FRIGORIFICO DEL SUR Y ANTAR
          </DIV>
          <div style="float:right " id="taraPdf">
            Tara:100000
          </div>
        </h3>
        <br>
          <h3>
            <DIV style=" float:left" id="patentePdf">
              Patente:1234567
            </DIV>
            <div style="float:right " id="pesoNetoPdf">
              Peso Neto:100000
            </div>
          </h3>
          <br><br><br>

          <br>
          <h3 >
            <DIV style=" float:left" id="fechaPdf">
              Fecha:00/00/0000
            </DIV>
            <div style=" float:right " >
              Firma:.........................
            </div>
          </h3>

          <br><br>
          <h3 style="text-align: center;" id="ticketIdPdf">
            Ticket:11111
          </h3>

          <h5 style="margin-left:80%;" >Comprobante de pago <br> para uso interno </h5>
         <h3 >
           <DIV style="float:left" id="productoPdf">
            Producto:HIELO ESCAMA
           </DIV>
           <div style="float:right " id="pesoBrutoPdf">
            Peso Bruto:100000
           </div>
         </h3>
       <br>
        <h3>
          <DIV style="float:left" id="clientePdf">
            Cliente:FRIGORIFICO DEL SUR Y ANTAR
          </DIV>
          <div style="float:right " id="taraPdf">
            Tara:100000
          </div>
        </h3>
        <br>
          <h3>
            <DIV style=" float:left" id="patentePdf">
              Patente:1234567
            </DIV>
            <div style="float:right " id="pesoNetoPdf">
              Peso Neto:100000
            </div>
          </h3>
          <br><br><br>

          <br>
          <h3 >
            <DIV style=" float:left" id="fechaPdf">
              Fecha:00/00/0000
            </DIV>
            <div style=" float:right " >
              Firma:.........................
            </div>
          </h3>

  </div>
  </div>

@endsection


@section('javascript')

  <script  src="{{ asset('js/dropdownNewTicket.js') }}"></script>
  <script>


    console.log(document.getElementById('ticketPdf'));
    var objeto=document.getElementById('ticketPdf');  //obtenemos el objeto a imprimir
  var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva
  ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
  ventana.document.close();  //cerramos el documento
  ventana.print();  //imprimimos la ventana

</script>
@endsection
