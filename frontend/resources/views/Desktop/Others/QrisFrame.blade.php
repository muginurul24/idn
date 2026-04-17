<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ config('app.cdn') }}/assets/css/fontawesome/all.min.css">
    <style>
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            background: #fff;
        }

        .container {
            /* width: 50%; */
            margin: auto;
            /* height: 108vh; */
            height: auto;
            background: #fff;
            /* padding: 2rem 3rem; */
        }

        .container-text {
            padding: 2rem 3rem;
            padding-bottom: 0px;
        }

        hr {
            border-color: #cdcdcd;
            margin: 10px 0px;
        }

        .img-qris {
            width: 100%;
            margin: 2rem 0rem;
        }

        .desc-detail {
            overflow-wrap: break-word;
        }

        .scan-text {
            font-size: 1.5rem;
        }

        .unpaid {
            font-size: 2rem;
        }

        .virtual-method {
            font-size: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <div class="container-text">
                        <span class="scan-text">Pindai untuk membayar</span>
                    </div>
                    <img class="img-responsive img-qris" src="{{ $qris }}" alt="qris-img">
                    <br>
                    <div class="btn btn-primary text-white" id="detail-show">Detail</div>
                </center>
                <br>
                <div class="detail-result" style="display: none">
                    <hr>
                    <div class="row">
                        <div class="col-md-4">No. Invoice</div>
                        <div class="col-md-6 desc-detail">
                            <span>{{ substr(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $pending->created_at)->timestamp, 1) }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">Tanggal</div>
                        <div class="col-md-6 desc-detail">
                            <span>{{ $pending->created_at }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">Batas Pembayaran</div>
                        <div class="col-md-6 desc-detail">
                            <span>{{ $expiresAt }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">Status</div>
                        <div class="col-md-6 desc-detail">
                            <span class="text-danger unpaid">UNPAID</span>
                            <br>
                            <a href="/transaction/history" class="no-print" target="_blank">
                                <em>Cek status pembayaran »</em>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">Name</div>
                        <div class="col-md-6 desc-detail">
                            <span>{{ $pending->bank->account_name }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">Desc</div>
                        <div class="col-md-6 desc-detail">
                            <span>Deposit from {{ auth()->user()->username }}</span>
                        </div>
                    </div>
                    <hr>
                    @if ($pending->amount % 1000 > 0)
                        <div class="row">
                            <div class="col-md-4">Amount</div>
                            <div class="col-md-6 desc-detail"> IDR
                                <span>{{ number_format($pending->amount - ($pending->amount % 1000), 2, ',', '.') }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">Fee</div>
                            <div class="col-md-6 desc-detail"> IDR <span>{{ $pending->amount % 1000 }},00</span>
                            </div>
                        </div>
                        <hr>
                    @endif
                    <div class="row">
                        <div class="col-md-4">{{ $pending->amount % 1000 > 0 ? 'Total' : 'Nominal' }}</div>
                        <div class="col-md-6 desc-detail"> IDR
                            <span>{{ number_format($pending->amount, 2, ',', '.') }}</span>
                            <br>
                            <a href="javascript:;" class="btn btn-xs text-danger copier"
                                data-clipboard-text="101528.78">
                                <em class="no-print">
                                    <u>
                                        <i class="fa fa-copy"></i> Salin Jumlah </u>
                                </em>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <strong>* Harap pastikan nominal kode unik sudah benar. </strong>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"
        integrity="sha512-hDWGyh+Iy4Mr9AHOzUP2+Y0iVPn/BwxxaoSleEjH/i1o4EVTF/sh0/A1Syii8PWOae+uPr+T/KHwynoebSuAhw=="
        crossorigin="anonymous"></script>
    <script src="{{ config('app.cdn') }}/assets/js/jquery/jquery-3.7.1.min.js"></script>
    <script>
        new ClipboardJS('.copier');
        $("#detail-show").click(function() {
            $(".detail-result").slideToggle();
        });
    </script>
</body>

</html>
