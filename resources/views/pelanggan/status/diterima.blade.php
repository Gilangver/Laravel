@extends('pelanggan.page.pesanan')

@section('hom')
@section('hom')<div class="atas">
        @foreach ($data as $b)
            <div class="d-flex justify-content-lg-center">
                <div class="up rounded-4 border-0" style=" width: 700px;">
                    <div class="mt-1 bg-success rounded-4 mb-1">
                        <table class="table table-responsive mt-3">
                            <tr class="text-center text-light align-middle" style="height: 80px;">
                                <td scope="col">{{ $b->id }}</td>
                                <td scope="col">{{ $b->user->nama }}</td>
                                <td scope="col">{{ $b->created_at }}</td>
                                <td scope="col">Total Pesanan Rp. {{ $b->total }}</td>
                                <td scope="col">
                                    <i class="fa-regular fa-circle-check fa-2x me-3"></i>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
