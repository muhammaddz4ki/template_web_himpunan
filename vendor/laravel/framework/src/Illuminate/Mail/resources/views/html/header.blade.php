@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjRk1iCPBYXUkfq-PW_8n7PFb3GEyTyIKjkdy9FuHeKcew7HnoyHiNDy0Kx-UQzgGJ2TzOpu-oRUTz24TcS09MycSLws_eV9cAUvl5vHKGGllsZJhKhmNlyNRGhiNi3NkkEAIlRvkjVC6qL/s1600/logo+IMM+tanfidz+solo.png" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
