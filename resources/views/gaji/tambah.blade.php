<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Gaji') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-700 min-h-screen flex items-center justify-center">

    <div class="bg-gray-500 shadow-md rounded-lg p-6 w-full max-w-md">

        <h2 class="text-2xl font-bold text-red-800 mb-4">
            Tambah Data Gaji
        </h2>

        <div class="mb-4">
            <a href="{{ route('gaji') }}" class="text-red-800 hover:underline text-sm">
                ← Kembali
            </a>
        </div>

        <form action="{{ route('gaji.create') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-white mb-1">
                    Pilih Karyawan
                </label>

                <select name="karyawan_id" 
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>

                    <option value="">-- Pilih Karyawan --</option>

                    @if(isset($karyawan) && count($karyawan) > 0)
                        @foreach ($karyawan as $k)
                            <option value="{{ $k->id }}">
                                {{ $k->nama }}
                            </option>
                        @endforeach
                    @else
                        <option value="">Tidak ada data karyawan</option>
                    @endif

                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-white mb-1">
                    Gaji
                </label>

                <input 
                    type="number" 
                    name="gaji" 
                    placeholder="Masukkan gaji"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <button 
                type="submit" 
                class="w-full bg-red-800 text-white py-2 rounded-md hover:bg-red-900 transition">
                Simpan
            </button>

        </form>

    </div>

</body>
</html>