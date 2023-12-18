@foreach($events as $event)
<li>
    <a href="{{route('event.show', $event)}}">
    {{$event->title}}
    </a>
</li>
@endforeach