@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('invoices.index') !!}">{{ __('invoice.invoice') }}</a>
      </li>
      <li class="breadcrumb-item active">{{ __('invoice.create') }}</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>{{ __('invoice.create_invoice') }}</strong>
                            </div>
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                    </div>
                                    <img src="https://www.limakode.com/wp-content/uploads/2020/03/5KODE1-small.png" class="ml-3" alt="...">
                                </div>
                                <hr />
                                <form>
                                <tr class="information">
                <td colspan="6">
                    <table>
                        <tr>
                            <td>
                                <strong>PENERIMA</strong><br>
                                ID Invoice: {{$invoice->id }} <br>
                                Nama: {{ $invoice->customer->nama }} <br>
                                Alamat: {{ $invoice->customer->alamat }} <br>
                                Kota: {{$invoice->customer->kota}} <br>
                                Kode Pos: {{$invoice->customer->kode_pos}} <br>
                                Telephone: {{ $invoice->customer->telepon }} <br>
                                Email: {{ $invoice->customer->email }} <br>
                                Organisasi: {{$invoice->customer->organisasi}}
                            </td>
                            
                            <div class="form-group float-right col-md-3">
                                <strong>PENGIRIM</strong><br>
                                Daengweb<br>
                                085343966997<br>
                                Jl Sultan Hasanuddin<br>
                                Somba Opu, Kab Gowa<br>
                                Sulawesi Selatan
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
                                </form>
                                <hr /> 
                                <hr />
                            <div class="row">
                            <div class="col-md-12 mt-3">
                            <h3>{{ __('invoice.product_list') }}</h3>
                            <br/>
                                <form action="{{ route('invoice.update', ['id' => $invoice->id]) }}" method="post">
                                @csrf
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</td>
                                            <th scope="col">{{ __('invoice.product') }}</td>
                                            <th scope="col">{{ __('invoice.qty') }}</td>
                                            <th scope="col">{{ __('invoice.price') }}</td>
                                            <th scope="col">{{ __('invoice.subtotal') }}</td>
                                            <th scope="col">{{ __('invoice.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1 @endphp
                                        @forelse ($invoice->detail as $detail)
                                        <tr>
                                            <td scope="row">{{ $no++ }}</td>
                                            <td>{{ $detail->produk->nama_produk }}</td>
                                            <td>{{ $detail->qty }}</td>
                                            <td>Rp {{ number_format($detail->harga_produk) }}</td>
                                            <td>Rp {{ $detail->subtotal }}</td>
                                            <td>
                                            <a href="{{ route('invoice.hapus', $detail->id) }}" class="btn btn-danger btn-sm">{{ __('invoice.delete') }}</ax>
                                        </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center">{{ __('invoice.comment') }}</td>
                                        </tr> 
                                        @endforelse
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input type="hidden" name="_method" value="PUT" class="form-control">
                                                <select name="produk_id" class="form-control">
                                                    <option value="">{{ __('invoice.select_product') }}</option>
                                                    @foreach ($produks as $produk)
                                                    <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" min="1" value="1" name="qty" class="form-control">
                                            </td>
                                            <td colspan="3">
                                                <button class="btn btn-primary btn-sm">{{ __('invoice.create') }}</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                </form>
                            </div>
                            </div>
                            <div class="totals col-md-6 float-right">
                                    <div class="totals_container">										
                                        <ul class="">
                                            <li class="">
                                                <div class="col"><strong>{{ __('invoice.subtotal') }}</strong></div>
                                                <input class="col no_input" type="text" disabled="" data-format-number="precision" value="Rp. {{ number_format($invoice->total) }}" data-calculation="subtotal">
                                            </li>
                                        </ul> 
                                        <ul class="statement_amount_container">
                                            <li class="statement_amount">
                                            <div class="col"><strong>{{ __('invoice.cost') }} (<span data-currency="code">{{ __('invoice.tax') }}</span>)</strong></div>
                                            <strong><input class="col no_input bold" type="text" disabled="" data-format-number="precision" data-calculation="total" value="Rp. {{ number_format($invoice->tax) }}"></strong>
                                        </li>
                                        </ul>
                                        <hr/>
                                        <ul class="statement_amount_container total_due draft">
                                        <li class="statement_amount">
                                            <div class="input-group border border-secondary">
                                                    <div class="input-group-prepend">
                                                    <div class="input-group-text"><strong>{{ __('invoice.total_price') }}</strong></div>
                                                    </div>
                                                    <input type="text" class="form-control" id="inlineFormInputGroup" value="Rp. {{ number_format($invoice->total_harga) }}">
                                            </div>
                                        </li>
                                        </ul>
                                        <br/>
                                <div class="form-group float-right">
                                    <a href="{{ route('invoices.index') }}" class="btn btn-primary btn-sm">{{ __('invoice.back_index') }}</a>
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