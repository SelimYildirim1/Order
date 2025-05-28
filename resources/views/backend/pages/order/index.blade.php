@extends('backend.layout.layout')
@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Siparişler</h5>
                            </div>
                            <div class="card-body">
                                <table id="example"
                                    class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th data-ordering="false">Sipariş Numarası</th>
                                            <th data-ordering="false">Ad Soyad</th>
                                            <th data-ordering="false">E-Mail</th>
                                            <th data-ordering="false">Telefon</th>
                                            <th data-ordering="false">Adres</th>
                                            <th data-ordering="false">Ürünler</th>
                                            <th data-ordering="false">Toplam Fiyat</th>
                                            <th>Kurye</th>
                                            <th data-ordering="false">Durum</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($orders))
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $order->order_number }}</td>
                                                    <td>{{ $order->name }}</td>
                                                    <td>{{ $order->email }}</td>
                                                    <td>{{ $order->phone }}</td>
                                                    <td>{{ $order->adress }}</td>
                                                    <td>{{ $order->products }}</td>
                                                    <td>{{ $order->total_price }}</td>
                                                    <td>
                                                        <form action="{{ route('panel.orders.courier', $order->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <select name="courier_id" onchange="this.form.submit()"
                                                                class="form-select">
                                                                @foreach ($couriers as $courier)
                                                                    <option value="0">
                                                                        Kurye Seç
                                                                    </option>
                                                                    <option value="{{ $courier->id }}"
                                                                        {{ (int) $order->courier === (int) $courier->id ? 'selected' : '' }}>
                                                                        {{ $courier->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </form>
                                                    </td>

                                                    <td>
                                                        <form action="{{ route('panel.orders.update', $order->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <select name="status" onchange="this.form.submit()"
                                                                class="form-select">
                                                                <option value="preparing"
                                                                    {{ $order->status == 'preparing' ? 'selected' : '' }}>
                                                                    Hazırlanıyor</option>
                                                                <option value="delivering"
                                                                    {{ $order->status == 'delivering' ? 'selected' : '' }}>
                                                                    Yolda</option>
                                                                <option value="delivered"
                                                                    {{ $order->status == 'delivered' ? 'selected' : '' }}>
                                                                    Teslim Edildi</option>
                                                            </select>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>

    <script>
        $(document).ready(function() {
            $('.delete-slider').click(function(e) {
                e.preventDefault();
                var sliderId = $(this).data('id');
                $.ajax({
                    url: '{{ route('panel.slider.destroy', ['id' => ':id']) }}'.replace(':id',
                        sliderId),
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        // Slider başarıyla silindiğinde yapılacak işlemler
                        console.log(response);
                        // Örneğin, sliderı arayüzden kaldırabilir veya bir bildirim gösterebilirsiniz.
                    },
                    error: function(xhr) {
                        // Hata durumunda yapılacak işlemler
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
