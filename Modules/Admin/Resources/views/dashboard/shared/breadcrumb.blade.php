    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{route('products.index')}}">Home</a></li>
            @php
                $segments = '';
                $requestSegments = \Illuminate\Support\Facades\Request::segments();
                $numSegment = count($requestSegments);
            @endphp
            @for($i = 0; $i <= $numSegment - 1; $i++)
                @php $segments .= '/' . $requestSegments[$i]; @endphp
                @if($i < $numSegment - 1)
                    <li class="breadcrumb-item">{{ ucfirst($requestSegments[$i]) }}</li>
                @else
                    <li class="breadcrumb-item active">{{ ucfirst($requestSegments[$i]) }}</li>
                @endif
            @endfor
        </ol>
    </div>
</header>
