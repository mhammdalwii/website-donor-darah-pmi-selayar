@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="{{ asset('assets/images/logoPMI.png') }}" class="logo" alt="Logo PMI Selayar"
                    style="height: 60px; object-fit: contain;">
            @else
                {!! $slot !!}
            @endif
        </a>
    </td>
</tr>
