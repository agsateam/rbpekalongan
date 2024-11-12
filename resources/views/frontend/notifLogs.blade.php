<html>
<head>
    <title>Notification Logs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
 
<body>
    <div class="mx-10 py-8">
        <h1 class="text-5xl">Notification Logs</h1>
 
        <div class="relative overflow-x-auto mt-10">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Time</th>
                        <th scope="col" class="px-6 py-3">For</th>
                        <th scope="col" class="px-6 py-3">To</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ Carbon\Carbon::createFromDate($d->created_at)->format("d/m/Y - H:i:s") }}
                            </td>
                            <td class="px-6 py-4">{{ $d->send_for }}</td>
                            <td class="px-6 py-4">{{ $d->to }}</td>
                            <td class="px-6 py-4">
                                {!!
                                    $d->success
                                    ? "<span class='bg-emerald-600 text-white px-3 py-1 rounded-md'>Berhasil</span>"
                                    : "<span class='bg-red-600 text-white px-3 py-1 rounded-md'>Gagal</span>"
                                !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-5">
                {{ $data->links() }}
            </div>
        </div>
 
    </div>
</body>
</html>