<h1>Conférences NBA</h1>

<ul>
    @foreach($conferences as $conference)
        <li>
            <a href="{{ route('conferences.show', $conference->id) }}">
                {{ $conference->name }}
            </a>
        </li>
    @endforeach
</ul>