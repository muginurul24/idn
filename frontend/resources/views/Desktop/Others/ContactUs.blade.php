<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff">
    <title>{{ config('app.name') . ' | ' . config('app.title') }}</title>
    <x-meta.seo />
    <link rel="icon" href="/storage/{{ config('app.favicon') }}" type="image/x-icon">
    <link rel="preconnect" href="https://classbet97x.space">
    <link rel="preload" href="https://classbet97x.space/idn/assets/css/desktop/style.css" as="style">
    <link rel="stylesheet" href="https://classbet97x.space/idn/assets/css/desktop/style.css">
    <script src="https://classbet97x.space/assets/js/jquery/jquery-3.7.1.min.js"></script>
</head>

<body class="popup_body">
    <div class="info_center">
        <div class="popup_logo">
            <img src="/storage/{{ config('app.desktop_logo') }}"
                alt="{{ config('app.name') . ' | ' . config('app.title') }}">
        </div>
        <div class="info_nav">
            <ul id="popup_nav">
            </ul>
        </div>
    </div>
    <div class="info_center">
        <div class="info_content">
            <h2>Hubungi Kami</h2>
            <table>
                <thead>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @if ($contact->whatsapp != null)
                        <tr>
                            <td>
                                <img src="https://classbet97x.space/idn/assets/img/help-icon/varia_5.png" width="80"
                                    height="80">
                            </td>
                            <td>: {{ '+62' . $contact->whatsapp }}</td>
                        </tr>
                        <tr>
                            <td>
                                <img src="https://classbet97x.space/idn/assets/img/help-icon/varia_6.png" width="80"
                                    height="80">
                            </td>
                            <td>: {{ '+62'.$contact->whatsapp }}</td>
                        </tr>
                    @endif
                    @if ($contact->facebook != null)
                        <tr>
                            <td>
                                <img src="https://classbet97x.space/idn/assets/img/help-icon/varia_7.png" width="80"
                                    height="80">
                            </td>
                            <td>: {{ $contact->facebook }}</td>
                        </tr>
                    @endif
                    @if ($contact->telegram != null)
                        <tr>
                            <td>
                                <img src="https://classbet97x.space/idn/assets/img/help-icon/telegram.png" width="80"
                                    height="80">
                            </td>
                            <td>: {{ '@' . $contact->telegram }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="info_center">
        <div class="footer_nav">
            <div class="info_copyright">{{ config('app.name') . ' | ' . config('app.title') }}. Hak Cipta Dilindungi.
            </div>
        </div>
    </div>
</body>

</html>
