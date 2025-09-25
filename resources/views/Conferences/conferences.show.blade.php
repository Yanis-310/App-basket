<h1>Conférence : {{ $conference->name }}</h1>

<h2>Équipes</h2>
<ul>
    @foreach($conference->teams as $team)
        <li>
            <a href="{{ route('teams.show', $team->id) }}">{{ $team->name }}</a>
            ({{ $team->wins }} victoires / {{ $team->losses }} défaites)
            <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </li>
    @endforeach
</ul>

<h3>Ajouter une équipe</h3>
<form action="{{ route('teams.store', $conference->id) }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nom de l'équipe" required>
    <button type="submit">Ajouter</button>
</form>
