@extends('admin.layouts.app')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Kullanıcılar</h1>
    <table id="table" class="table table-bordered dataTable" style="width:100%">
        <thead>
            <tr>
                <th>İşlemler</th>
                <th>İsim</th>
                <th>Email</th>
                <th>Kullanıcı Türü</th>
                <th>Aktiflik</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection
@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/b-2.2.3/r-2.3.0/datatables.min.js">
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.kullanicilar') }}",
                columns: [{
                        width: '12%',
                        data: 'islemler',
                        name: 'islemler',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'kullanici_turu',
                        name: 'kullanici_turu'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                drawCallback: function() {
                    $('.toggle').bootstrapToggle();
                    $('#aktif').change(function() {
                        var status = $(this).prop('checked') == true ? 1 : 0;
                        var user_id = $(this).data('id');
                        $.ajax({
                            type: "GET",
                            url: "{{ route('admin.kullanicilar.aktifPost') }}",
                            data: {
                                id: user_id,
                                aktif: status,

                            },
                            success: function(data) {
                                if (data.error) {
                                    flasher.error(data.error);
                                } else {
                                    flasher.success(data.success);
                                }
                                console.log(data)
                            },


                        });
                    })
                }

            });
            $('body').on('click', '#delete', function() {
                    var row_id = $(this).data("id");
                    var result = confirm("Kullanıcıyı silmek istediğinizden emin misiniz?");
                    var url = "{{ route('admin.kullanicilar.silPost', ':id') }}";
                    url = url.replace(':id', row_id);
                    if (result) {
                        $.ajax({
                            type: "POST",
                            url: url,
                            success: function(data) {
                                if (data.error) {
                                    flasher.error(data.error);
                                } else {
                                    table.draw();
                                    flasher.success(data.success);
                                }

                            },
                            error: function(data) {
                                console.log('Error:', data);
                            }
                        });
                    } else {
                        return false;
                    }
                });
                $('body').on('click', '#edit', function() {
                    var row_id = $(this).data('id');
                    var url = "{{ route('admin.kullanicilar.duzenle', ':id') }}";
                    url = url.replace(':id', row_id);
                    window.location = url;

                });
        });
    </script>
@endsection
