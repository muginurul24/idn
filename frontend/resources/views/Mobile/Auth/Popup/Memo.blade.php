<x-mobile.layout>
    <div class="container mb-xlg">
        <div class="forms">
            <form method="post" action="/memo/create">
                <div class="box_table">
                    <div class="tab">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="result-tabs">
                            <li class="nav-item">
                                <a href="#inbox" class="nav-link active" aria-controls="inbox" role="tab"
                                    data-toggle="tab">Kotak Masuk</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sent" class="nav-link" aria-controls="sent" role="tab"
                                    data-toggle="tab">Sent Box</a>
                            </li>
                            <li class="nav-item">
                                <a href="#compose" class="nav-link" aria-controls="compose" role="tab"
                                    data-toggle="tab">Compose</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content mt-10">
                            <div role="tabpanel" class="tab-pane fade show active" id="inbox">
                                <table id="tablelist" class="retable">
                                    <tbody>
                                        @if ($notifs->count() > 0)
                                            <tr>
                                                <th style="text-align:center;">#</th>
                                                <th style="width:100px;">Tanggal</th>
                                                <th style="width:100px;">Subyek</th>
                                                <th></th>
                                            </tr>
                                        @endif
                                        @forelse ($notifs as $key => $memo)
                                            <tr class="oddrow">
                                                <td style="text-align:center;">{{ $key + 1 }}</td>
                                                <td style="text-align:left;">
                                                    {{ $memo->created_at->format('d/m/Y H:i') }}</td>
                                                <td align="left" style="text-align:left;">
                                                    <span>{{ Str::title($memo->title) }}</span><br>
                                                </td>
                                                <td style="text-align:center;">
                                                    <a href="#"
                                                        onclick="showMessage('#inbox-{{ $memo->id }}'); markAsRead('{{ $memo->id }}')"
                                                        data-toggle="modal"
                                                        data-target="#inbox-{{ $memo->id }}">[Baca]</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="inbox-{{ $memo->id }}" tabindex="-1"
                                                role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">
                                                                {{ Str::title($memo->title) }}
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body memo">
                                                            {!! clean($memo->description) !!}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-right"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="alert alert-success text-center">
                                                Tidak ada pesan di kotak masuk
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="mx-auto" style="width: 207px;margin: 10px 0;">

                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade show" id="sent">
                                <table id="tablelist" class="retable">
                                    <tbody>
                                        @session('success')
                                            <div class="alert alert-success text-center">
                                                {{ session('success') }}
                                            </div>
                                        @endsession
                                        @if ($memos->count() > 0)
                                            <tr>
                                                <th style="text-align:center;">#</th>
                                                <th style="width:100px;">Tanggal</th>
                                                <th style="width:100px;">Subyek</th>
                                                <th></th>
                                            </tr>
                                        @endif
                                        @forelse ($memos as $key => $memo)
                                            <tr class="oddrow">
                                                <td style="text-align:center;">{{ $key + 1 }}</td>
                                                <td style="text-align:left;">
                                                    {{ $memo->created_at->format('d/m/Y H:i') }}</td>
                                                <td align="left" style="text-align:left;">
                                                    <span>{{ Str::title($memo->title) }}</span><br>
                                                </td>
                                                <td style="text-align:center;">
                                                    <a href="#"
                                                        onclick="showMessage('#inbox-{{ $memo->id }}'); markAsRead('{{ $memo->id }}')"
                                                        data-toggle="modal"
                                                        data-target="#inbox-{{ $memo->id }}">[Baca]</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="inbox-{{ $memo->id }}" tabindex="-1"
                                                role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">
                                                                {{ Str::title($memo->title) }}
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body memo">
                                                            {!! clean($memo->description) !!}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-right"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="alert alert-success text-center">
                                                Kami tidak memiliki pesan di kotak keluar
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div role="tabpanel" class="tab-pane fade show" id="compose">
                                @if ($errors->any())
                                    <div class="alert alert-danger text-center">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @session('success')
                                    <div class="alert alert-success text-center">
                                        {{ session('success') }}
                                    </div>
                                @endsession
                                @if ($sender)
                                    <div style="color:black">
                                        <h5 class="text-center">Memo terakhir anda masih belum di baca oleh operator.
                                            Harap
                                            tunggu sebelum melakukan pengiriman memo baru</h5>
                                    </div>
                                @else
                                    <div class="memo">
                                        <div class="form-group">
                                            <label for="memo-subject">Subyek :</label>
                                            <input name="title" type="text" class="form-control"
                                                id="memo-subject" />
                                        </div>
                                        <div class="form-group">
                                            <label for="memo-message">Pesan :</label>
                                            <textarea name="content" class="form-control" rows="5" id="memo-message"></textarea>
                                        </div>
                                    </div>
                                    <div class="Btn_med_width">
                                    </div>
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-primary btn-block btn-lg mt-10 text-uppercase">Kirim</button>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-mobile.layout>
