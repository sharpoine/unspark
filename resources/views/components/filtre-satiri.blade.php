<div class="card">
    <form action="" method="get">
        <div class="card-body">
            <div class="row">

                <div class="col-md-3 form-group">
                    <label for="baslik">Başlık</label>
                    <input autocomplete="off" class="form-control" name='baslik' value="{{ $baslik }}">
                </div>
                <div class="col-md-3 form-group">
                    <label for="icerik">İçerik</label>
                    <input autocomplete="off" class="form-control" name='icerik' value="{{ $icerik }}">
                </div>
                <div class="col-md-3 form-group">
                    <label for="kullanici">Post sahibi:</label>
                    <input autocomplete="off" name="kullanici" type="text" class="form-control" value="{{ $kullanici }}">
                </div>
                <div class="col-md-3 form-group">
                    <label for="baslangicBitisTarihi">Tarih Aralığı:</label>
                    <input autocomplete="off" class="form-control" type="text" id="baslangicBitisTarihi" name='baslangicBitisTarihi'
                        value="{{ $baslangicBitisTarihi }}">
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-primary float-right">Filtrele</button>
                </div>
            </div>

        </div>
    </form>
</div>
@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script>
        $(function() {

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D') + '  ' + end.format('MMMM D'));
            }


            $('#baslangicBitisTarihi').daterangepicker({
                "autoUpdateInput": false,
                "drops": "down",
                "timePicker24Hour": true,
                "opens": "left",
                "applyClass": "btn btn-xs btn-default",
                "cancelClass": "btn btn-xs btn-link",
                ranges: {
                    'Bugün': [moment(), moment()],
                    'Dün': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Son 7 gün': [moment().subtract(6, 'days'), moment()],
                    'Son 30 gün': [moment().subtract(29, 'days'), moment()],
                    'Bu ay': [moment().startOf('month'), moment().endOf('month')],
                    'Geçen ay': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                "locale": {
                    "format": "YYYY-MM-DD",
                    "separator": " | ",
                    "applyLabel": "Uygula",
                    "cancelLabel": "Vazgeç",
                    "fromLabel": "Dan",
                    "toLabel": "a",
                    "customRangeLabel": "Seç",
                    "daysOfWeek": [
                        "Pt",
                        "Sl",
                        "Çr",
                        "Pr",
                        "Cm",
                        "Ct",
                        "Pz"
                    ],
                    "monthNames": [
                        "Ocak",
                        "Şubat",
                        "Mart",
                        "Nisan",
                        "Mayıs",
                        "Haziran",
                        "Temmuz",
                        "Ağustos",
                        "Eylül",
                        "Ekim",
                        "Kasım",
                        "Aralık"
                    ],
                    "firstDay": 1,

                }

            }, cb);

            $('input[name="baslangicBitisTarihi"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' | ' + picker.endDate.format(
                    'YYYY-MM-DD'));
            });

        });
    </script>
@endpush
