<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tagihan Invoice {{ $invoice->id }}</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: normal; /* inherit */
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://www.limakode.com/wp-content/uploads/2020/03/5KODE1-small.png" width="150px">
                            </td>
                            <td>
                            <h1>INVOICE</h1>
                                ID Invoice : #{{ $invoice->id }}<br>
                                {{ $invoice->created_at->format('D, d M Y') }}<br>
                                {{ $invoice->batas_pembayaran}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                            <strong>PENERIMA</strong><br>
                                {{ $invoice->customer->nama }}<br>
                                {{ $invoice->customer->organisasi}}<br>
                                {{ $invoice->customer->alamat }}<br>
                                Telp: {{ $invoice->customer->telepon }}<br>
                                Email: {{ $invoice->customer->email }}<br>
                            </td>
                            
                            <td>
                                <strong>PENGIRIM</strong><br>
                                {{ Auth::user()->name }}<br>
                                {{ Auth::user()->perusahaan }}<br>
                                {{ Auth::user()->alamat }}<br>
                                {{ Auth::user()->telephon }}<br>
                                {{ Auth::user()->email }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>Produk</td>
                <td>Subtotal</td>
            </tr>

            @foreach ($invoice->detail as $row)
                    <tr class="item">
                        <td>
                            {{ $row->produk->nama_produk }}<br>
                            <strong>Harga</strong>: Rp {{ number_format($row->harga_produk) }} x {{ $row->qty }}
                        </td>
                        <td>Rp {{ number_format($row->harga_produk * $row->qty) }}</td>
                    </tr>
            @endforeach
            
            
            <tr class="total">
                <td></td>
                <td>
                   Subtotal: Rp {{ number_format($invoice->total) }}
                </td>
            </tr>
            <tr class="tax">
                <td></td>
                <td>
                   Tax: Rp {{ number_format($invoice->tax) }}
                </td>
            </tr>
            <tr class="total">
                <td></td>
                <td>
                   Total: Rp {{ number_format($invoice->total_harga) }}
                </td>
            </tr>

            <tr>
                <td><strong>Detail Pembayaran</strong></td>
                <td></td>
            </tr>
            <tr>
                <td>Model Pembayaran: Transfer ATM</td>
                <td></td>
            </tr>
            <tr>
                <td>Deskripsi: Rekening BRI a/n Luhut Binsar 0998766766556</td>
                <td></td>
            </tr>
        </table>
    </div>
</body>
</html>
