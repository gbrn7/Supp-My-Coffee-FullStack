@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Supp-My-Coffee')
<img src="https://laravel.com/img/notification-logo.png" 
class="logo" alt="logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
