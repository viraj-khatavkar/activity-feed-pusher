 @foreach ($activity as $event)
    <li class="list-group-item">
        @include ("activity.types.{$event->description}")
    </li>
@endforeach