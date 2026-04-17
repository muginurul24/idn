<div class="ard-sosmed">
    <div class="attention whore">
        Bantuan !
    </div>
    <div class="hamburg" onclick="ardFunction()">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
    <ul>
        @if ($contact)
            <li>
                <a href="https://wa.me/+62{{ $contact?->whatsapp }}" target="_blank">
                    <img src="https://classbet97x.space/idn/assets/img/wa.gif" alt="Whatsapp {{ config('app.name') }}">
                </a>
                <div>
                    WHATSAPP
                </div>
            </li>
            <li>
                <a href="https://www.facebook.com/groups/{{ $contact?->facebook }}?locale=id_ID" target="_blank">
                    <img src="https://classbet97x.space/idn/assets/img/fb.gif" alt="FACEBOOK {{ config('app.name') }}">
                </a>
                <div>
                    FACEBOOK {{ config('app.name') }}
                </div>
            </li>
            <li>
                <a href="https://t.me/{{ $contact->telegram }}" target="_blank">
                    <img src="https://classbet97x.space/idn/assets/img/telegram.gif"
                        alt="Telegram {{ config('app.name') }}">
                </a>
                <div>
                    Telegram {{ config('app.name') }}
                </div>
            </li>
        @endif
        <li>
            <a href="/rtp" target="_blank">
                <img src="https://classbet97x.space/idn/assets/img/rtp.gif" alt="RTP Slot {{ config('app.name') }}">
            </a>
            <div>
                RTP SLOT
            </div>
        </li>
        <li>
            <a href="https://1.1.1.1/" target="_blank">
                <img src="https://classbet97x.space/idn/assets/img/vpn.ico" alt="APK ANTI NAWALA">
            </a>
            <div>
                VPN ANTI BLOKIR
            </div>
        </li>
    </ul>
</div>
