@extends('backend.layout.layout')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Kuryeler</h5>
                            </div>
                            <div class="card-body">
                                <a type="button" href="{{ route('panel.couriers.create') }}"
                                    class="btn btn-success waves-effect waves-light mb-3">Yeni Ekle</a>
                                <table id="example"
                                    class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th data-ordering="false">Ad Soyad</th>
                                            <th data-ordering="false">Mail</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($couriers))
                                            @foreach ($couriers as $courier)
                                                <tr>
                                                    <td>{{ $courier->name }}</td>
                                                    <td>
                                                        {{ $courier->email }}
                                                    </td>
                                                    <td>
                                                        <div class="dropdown d-inline-block">
                                                            <button class="btn btn-soft-secondary btn-sm dropdown"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="ri-more-fill align-middle"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item edit-item-btn"
                                                                        href="{{ route('panel.couriers.edit', $courier->id) }}"><i
                                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                        Düzenle</a></li>
                                                                <li>
                                                                    {{-- <form
                                                                        action="{{ route('panel.menus.destroy', $courier->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="dropdown-item remove-item-btn">
                                                                            <i
                                                                                class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                            Sil
                                                                        </button>
                                                                    </form> --}}
                                                                    <button
                                                                        class="delete-courier dropdown-item remove-item-btn"
                                                                        data-id="{{ $courier->id }}">
                                                                        <i
                                                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                        Sil
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
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
            $('.delete-courier').click(function(e) {
                e.preventDefault();
                var courierId = $(this).data('id');
                $.ajax({
                    url: '{{ route('panel.couriers.destroy', ['id' => ':id']) }}'.replace(':id',
                        courierId),
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        // menus başarıyla silindiğinde yapılacak işlemler
                        console.log(response);
                        // Örneğin, menusı arayüzden kaldırabilir veya bir bildirim gösterebilirsiniz.
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
