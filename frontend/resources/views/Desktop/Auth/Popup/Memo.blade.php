<x-desktop.popup-layout>
    <form method="post" action="/memo/create">
        @csrf
        <div class="box_table">
            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist" id="result-tabs">
                    <li id="li-compose" class="nav-item">
                        <a href="#compose" class="nav-link" aria-controls="compose" role="tab"
                            data-toggle="tab">Compose</a>
                    </li>
                    <li id="li-inbox" class="nav-item">
                        <a href="#inbox" class="nav-link active" aria-controls="inbox" role="tab"
                            data-toggle="tab">Kotak Masuk</a>
                    </li>
                    <li id="li-send" class="nav-item">
                        <a href="#sent" class="nav-link" aria-controls="sent" role="tab" data-toggle="tab">Sent
                            Box</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
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
                    <div role="tabpanel" class="tab-pane fade" id="compose">
                        @if ($sender)
                            <div style="color:white">
                                <h2 class="text-center">Memo terakhir anda masih belum di baca oleh operator. Harap
                                    tunggu sebelum melakukan pengiriman memo baru</h2>
                            </div>
                        @else
                            <div class="memo">
                                <div>
                                    <div style="width:100px;">Subyek :</div>
                                    <div><input name="title" type="text" style="width: 400px;" /></div>
                                </div>
                                <div>
                                    <div style="width:100px;">Pesan :</div>
                                    <textarea name="content" style="width: 400px;height: 150px;"></textarea>
                                </div>
                            </div>
                            <div class="Btn_med_width">
                            </div>
                            <div class="Btn_med_width min-height-10">
                                <button type="submit" class="Btn Btn_floatLeft blueMedBtn">Kirim</button>
                            </div>
                        @endif
                    </div>

                    <div role="tabpanel" class="tab-pane fade show active" id="inbox">
                        <table id="tablelist" class="retable">
                            <tbody>
                                <tr>
                                    <th style="width:50px">#</th>
                                    <th style="width:100px;">Tanggal</th>
                                    <th>Subyek</th>
                                    <th style="width:150px;"></th>
                                </tr>
                                @foreach ($notifs as $key => $notif)
                                    @php
                                        $read = \App\Models\Mark::where('user_id', '=', auth()->user()->id)
                                            ->where('ticket_id', '=', $notif->id)
                                            ->first();
                                    @endphp
                                    <tr class="{{ $key % 2 > 0 ? 'evenrow' : 'oddrow' }}">
                                        <td style="text-align:center;">{{ $key + 1 }}</td>
                                        <td style="text-align:center;">{{ $notif->created_at->format('d/m/Y H:i') }}
                                        </td>
                                        <td style="text-align:left;">
                                            @if ($read)
                                                <span>PEBEMRITAHUAN !!</span><br>
                                            @else
                                                <span>PEBEMRITAHUAN !! <i class="fa fa-circle"
                                                        style="color:#c1123b"></i></span><br>
                                            @endif
                                            <div class="mt-10" id="inbox-{{ $notif->id }}" style="display: none;">
                                                {!! clean($notif->description) !!}
                                            </div>
                                        </td>
                                        <td style="text-align:center;">
                                            <a href="#"
                                                onclick="showMessage('#inbox-{{ $notif->id }}'); markAsRead('{{ $notif->id }}')">[Baca]</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="display: flex; justify-content: center; margin: .5rem 0;">

                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="sent">
                        <table id="tablelist" class="retable">
                            <tbody>
                                @if ($memos->count() > 0)
                                    <tr>
                                        <th style="width:50px">#</th>
                                        <th style="width:100px;">Tanggal</th>
                                        <th>Subyek</th>
                                        <th style="width:150px;">Action</th>
                                    </tr>
                                @endif
                                @forelse ($memos as $key => $memo)
                                    <tr class="{{ $key % 2 > 0 ? 'evenrow' : 'oddrow' }}">
                                        <td style="text-align:center;">{{ $key + 1 }}</td>
                                        <td style="text-align:center;">{{ $memo->created_at->format('d/m/Y H:i') }}
                                        </td>
                                        <td style="text-align:left;">
                                            <span>{{ Str::title($memo->title) }}</span><br>
                                            <div class="" id="outbox-{{ $memo->id }}" style="display: none;">
                                                {!! clean($memo->description) !!}
                                            </div>
                                        </td>
                                        <td style="text-align:center;">
                                            <a href="#"
                                                onclick="showMessage('#outbox-{{ $memo->id }}')">[Baca]</a>&nbsp;&nbsp;&nbsp;
                                            <a href="#" onclick="deleteMessage({{ $memo->id }})">[Hapus]</a>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-success text-center">
                                        Kami tidak memiliki pesan di kotak keluar
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-desktop.popup-layout>
