<div class="table-responsive-sm">
    <table class="table table-striped" id="transaksis-table">
        <thead>
            <tr>
                <th>Kode Transaksi</th>
        <th>Nama Customer</th>
        <th>Jumlah Transaksi</th>
        <th>Kode Invoice</th>
        <th>Tanggal Transaksi</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($transaksis as $transaksi)
            <tr>
                <td>{{ $transaksi->kode_transaksi }}</td>
            <td>{{ $transaksi->nama_customer }}</td>
            <td>{{ $transaksi->jumlah_transaksi }}</td>
            <td>{{ $transaksi->kode_invoice }}</td>
            <td>{{ $transaksi->tanggal_transaksi }}</td>
                <td>
                    {!! Form::open(['route' => ['transaksis.destroy', $transaksi->id], 'method' => 'delete']) !!}
                    <div class=''>
                        <a href="{{ route('transaksis.show', [$transaksi->id]) }}" class="btn btn-primary btn-sm">Belum</a>
                        <a href="{{ route('transaksis.edit', [$transaksi->id]) }}" class="btn btn-secondary btn-sm">Kredit</a>
                        <button class="btn btn-danger btn-sm">Lunas</button>
                        <!-- {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>