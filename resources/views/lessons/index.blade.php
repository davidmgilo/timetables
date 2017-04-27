{{--{{ dump($lessons) }}--}}

<ul>
    @foreach ($lessons as $lesson)
        <li>This is lesson {{ $lesson->id }}</li>
    @endforeach
</ul>