<div class="flex justify-center mt-4 sm:items-center sm:justify-between">
    <div class="text-center text-sm text-gray-500 sm:text-left">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
            <div class="ml-1 ">
                歡迎來到狗狗資料庫系統
            </div>
        </div>
    </div>

    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
        @if (\App\Models\Varietie::max('updated_at') > \App\Models\Somatotype::max('updated_at'))
            {{ \App\Models\Varietie::max('updated_at') }}
        @else
            {{ \App\Models\Somatotype::max('updated_at') }}
        @endif
    </div>
</div>

