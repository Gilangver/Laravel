@extends('admin.page.transaksi')

@section('stts')
    <div class="atas">
        @foreach ($data as $b)
            <div class="d-flex justify-content-lg-center detbb">
                <div class="up rounded-4 border-0 " style=" width: 700px;">
                    <div class=" bg-success rounded-4 ">
                        <table class="table table-responsive mt-1">
                            <tr class="text-center text-light align-middle " style="height: 80px;">
                                <td scope="col">{{ $b->id }}</td>
                                <td scope="col">{{ $b->user->nama }}</td>
                                <td scope="col">{{ $b->created_at }}</td>
                                <td scope="col">Total Pesanan Rp. {{ $b->total }}</td>
                                <td>
                                    <input type="hidden" value="{{ $b->status }}">
                                    <button class="btn btn-warning "  style="font-size: 14px;">Bayar Sekarang</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
