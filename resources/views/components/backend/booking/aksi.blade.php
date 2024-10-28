<div class="flex gap-1">
    @if ($data->check_in == null)
        <button onclick="confirmCheckIn('{{ route('manage.booking.checkin') . '/' . $data->id }}')" class="btn btn-sm bg-emerald-600 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
            </svg>
        </button>
    @endif
    <button onclick="confirmCancel('{{ route('manage.booking.cancel') . '/' . $data->id }}')" class="btn btn-sm bg-red-600 text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
</div>