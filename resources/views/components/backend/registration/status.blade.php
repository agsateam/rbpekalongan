@if ($data->status != 'registered')
    @if ($data->status == 'accepted')
        <span class="text-emerald-700 font-semibold">Disetujui</span>
    @else
        <span class="text-red-700 font-semibold">Ditolak</span>
    @endif
@else
    <span class="text-gray-600 font-semibold">Perlu Proses</span>
@endif