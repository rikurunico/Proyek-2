@if ((int)$year >= (int)$year_checkin && (int)$year <= (int)$max_year)
    @if ($year == $year_checkin)
        @foreach ($months_year_checkin as $month)
            <div role="button" class="month-box text-nowrap col col-lg-auto px-3 py-1 border-black-solid text-black">{{ $month["name"] }}</div>        
        @endforeach
    @else
        @foreach ($months as $month)
            <div role="button" class="month-box text-nowrap col col-lg-auto px-3 py-1 border-black-solid text-black">{{ $month["name"] }}</div>        
        @endforeach
    @endif
@else
    No Data
@endif