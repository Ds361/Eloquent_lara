<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>{{ config('app.name', 'Gaji') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-md">

        <!-- Judul -->
        <h2 class="text-2xl font-bold text-gray-800 mb-4">
            Edit Data Gaji
        </h2>

        <!-- Tombol kembali -->
        <div class="mb-4">
            <a href="{{ route('gaji') }}" class="text-blue-600 hover:underline text-sm">
                ← Kembali
            </a>
        </div>

        <!-- Form -->
        <form action="{{ route('gaji.update', ['id' => $gaji->id]) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- ✅ TAMBAHAN INI (TIDAK MENGUBAH TAMPILAN) -->
            <input type="hidden" name="karyawan_id" value="{{ $gaji->karyawan_id }}">

            <!-- Input Gaji -->
            <div>
                <label for="gaji" class="block text-sm font-medium text-gray-700 mb-1">
                    Gaji
                </label>
                <input 
                    type="number" 
                    name="gaji" 
                    id="gaji" 
                    value="{{ $gaji->gaji }}"
                    placeholder="Masukkan gaji"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <!-- Button -->
            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition"
            >
                Simpan Perubahan
            </button>
        </form>

    </div>

</body>
</html>