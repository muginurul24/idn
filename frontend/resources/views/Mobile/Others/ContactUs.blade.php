<x-mobile.layout>
    <div class="container mb-20">
        <div class="contact mt-10">
            <h4>Hubungi Kami</h4>
            <table>
                <thead>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @if ($contact->whatsapp != null)
                        <tr>
                            <td><img src="https://classbet97x.space/idn/assets/img/help-icon/varia_5.png" width="40"
                                    height="40"></td>
                            <td>: {{ '+62' . $contact->whatsapp }}</td>
                        </tr>
                        <tr>
                            <td><img src="https://classbet97x.space/idn/assets/img/help-icon/varia_6.png" width="40"
                                    height="40"></td>
                            <td>: {{ '+62' . $contact->whatsapp }}</td>
                        </tr>
                    @endif
                    @if ($contact->facebook != null)
                        <tr>
                            <td><img src="https://classbet97x.space/idn/assets/img/help-icon/varia_7.png" width="40"
                                    height="40"></td>
                            <td>: {{ $contact->facebook }}</td>
                        </tr>
                    @endif
                    @if ($contact->telegram != null)
                        <tr>
                            <td><img src="https://classbet97x.space/idn/assets/img/help-icon/telegram.png" width="40"
                                    height="40"></td>
                            <td>: {{ '@' . $contact->telegram }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-mobile.layout>
