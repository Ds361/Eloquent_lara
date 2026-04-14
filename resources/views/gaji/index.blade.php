<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Gaji') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-700 min-h-screen p-6">

    <div class="max-w-4xl mx-auto bg-gray-500 shadow-md rounded-lg p-6 border border-red-100">

        <!-- Judul -->
        <h2 class="text-2xl font-bold text-red-800 mb-4">
            Informasi Salary
        </h2>

        <!-- Search -->
        <form method="GET" action="{{ route('gaji') }}" class="mb-4 flex gap-2">

            <input 
                type="text" 
                name="search" 
                placeholder="Cari nama karyawan..."
                value="{{ request('search') }}"
                class="border border-red-200 px-3 py-2 rounded w-1/3 focus:outline-none focus:ring-2 focus:ring-red-300"
            >

            <button 
                type="submit" 
                class="bg-red-800 text-white px-4 py-2 rounded hover:bg-red-900">
                Cari
            </button>

        </form>

        <!-- Tombol tambah -->
        <div class="mb-4">
            <a href="{{ route('gaji.tambah') }}" 
               class="bg-red-800 text-white px-4 py-2 rounded hover:bg-red-900">
                + Tambah Gaji
            </a>
        </div>

        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="w-full border border-red-100 text-sm">

                <thead class="bg-red-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-red-800">ID</th>
                        <th class="px-4 py-2 text-left text-red-800">Nama Karyawan</th>
                        <th class="px-4 py-2 text-left text-red-800">Gaji</th>
                        <th class="px-4 py-2 text-left text-red-800">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($gaji as $p)
                        <tr class="border-t hover:bg-red-50">

                            <td class="px-4 py-2">{{ $p->id }}</td>

                            <td class="px-4 py-2">
                                {{ $p->karyawan->nama ?? '-' }}
                            </td>

                            <td class="px-4 py-2">
                                Rp {{ number_format($p->gaji, 0, ',', '.') }}
                            </td>

                            <td class="px-4 py-2 flex gap-3">

                                <a href="/gaji/{{ $p->id }}" 
                                   class="text-yellow-600 hover:underline">
                                    Edit
                                </a>

                                <form action="{{ route('gaji.delete', ['id' => $p->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">

                                    <button type="submit" 
                                            class="text-red-600 hover:underline">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            <!-- Tombol kembali -->
            <div class="mt-4">
                <a href="{{ route('karyawan') }}" 
                   class="text-red-700 hover:underline">
                    ← Kembali ke Karyawan
                </a>
            </div>

        </div>

    </div>

</body>
</html>