<b>{{ $appName }}</b> ({{ $level_name }})
Env: {{ $appEnv }}
---
{!! $message !!}
---
@if ($context)
<b>Context:</b>
<code>@json($context, JSON_PRETTY_PRINT)</code>
@endif