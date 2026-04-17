<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Complaints - Customer Complaints</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <script src="https://classbet97x.space/idn/assets/ticket/ticket.js"></script>
    <link rel="preload" href="https://classbet97x.space/idn/assets/ticket/style.css" as="style">
    <link rel="stylesheet" href="https://classbet97x.space/idn/assets/ticket/style.css">
</head>

<body class="font-sans antialiased">
    <div id="app">
        @if ($allowed)
        <div class="w-full md:w-[450px] mx-auto p-[25px]">
            <div class="heading-container clearfix">
                @if ($errors->any())
                <h1 class="form-heading float-left">{{ $errors->first() }}</h1>
                @else
                <h1 class="form-heading float-left">Pengaduan Konsumen</h1>
                @endif
                @if (!$errors->any())
                <select class="language-change float-right py-0 pl-1 text-xs" name="lang">
                    <option value="id">Indonesia</option>
                </select>
                @endif
            </div>
            <div class="mt-4 reminder-container">
                <ul>
                    <li>Silakan sampaikan segala bentuk keluhan yang Anda alami.</li>
                    <li>Pesan Anda akan diteruskan kepada tim pusat yang bertanggung jawab dalam penanganan pengaduan
                        konsumen.</li>
                </ul>
            </div>
            <div class="form">
                <form method="post" action="/ticket/create">
                    @csrf
                    <div>
                        <label for="category" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mt-2 !text-[#494949] dark:!text-[#494949] font-bold">Kategori</label>
                        <select id="category" name="category" required="" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm py-0 text-base mt-1 block w-full h-8 !bg-transparent !border-[#ced4da] !text-[#495057] !shadow-none">
                            <option value="Deposit tidak diproses">Deposit tidak diproses</option>
                            <option value="Withdraw tidak dibayar">Withdraw tidak dibayar</option>
                            <option value="Tidak Ada LiveChat">Tidak Ada LiveChat</option>
                            <option value="Pelayanan Customer Service">Pelayanan Customer Service</option>
                            <option value="Laporan Kecurangan pemain">Laporan Kecurangan pemain</option>
                        </select>
                    </div>
                    <div>
                        <label for="website" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mt-2 !text-[#494949] dark:!text-[#494949] font-bold">Website</label>
                        <input id="website" name="website" required="" readonly="" type="text" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm text-base mt-1 block w-full h-8 !bg-[#e9ecef] !border-[#ced4da] !text-[#495057] !shadow-none" value="{{ Str::replace('https://', '', config('app.url')) }}">
                    </div>
                    <div>
                        <label for="userid" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mt-2 !text-[#494949] dark:!text-[#494949] font-bold">User ID (Username yang dipakai di dalam permainan/meja)</label>
                        <input id="userid" name="userid" required="" placeholder="Userid" type="text" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm text-base mt-1 block w-full h-8 !bg-transparent !border-[#ced4da] !text-[#495057] !shadow-none"  >
                    </div>
                    <div>
                        <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mt-2 !text-[#494949] dark:!text-[#494949] font-bold">Email / No telp / Whatsapp</label>
                        <input id="email" name="email" required="" placeholder="Kontak harus valid dan dapat dihubungi" type="text" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm text-base mt-1 block w-full h-8 !bg-transparent !border-[#ced4da] !text-[#495057] !shadow-none" value="">
                    </div>
                    <div>
                        <label for="comment" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mt-2 !text-[#494949] dark:!text-[#494949] font-bold">Keluhan</label>
                        <textarea id="comment" name="comment" required="" placeholder="Silakan tuliskan keluhan Anda beserta tanggal dan waktu saat kendala terjadi" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm text-base mt-1 block w-full h-8 !bg-transparent !border-[#ced4da] !text-[#495057] !shadow-none !h-40 !border-solid rounded-md"></textarea>
                    </div>
                    <div class="flex w-full mt-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 false ml-auto !bg-blue-500 text-white hover:!bg-blue-300 dark:text-white">Kirim Pengaduan</button>
                    </div>
                </form>
            </div>
        </div>
        @else
        <div class="w-full md:w-[450px] mx-auto p-[25px]">
            <div class="heading-container clearfix">
                <h1 class="form-heading float-left">Your ticket is currently under our review.</h1>
            </div>
        </div>
        @endif
    </div>
</body>

</html>
