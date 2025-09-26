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
<h2>Ajouter une nouvelle équipe</h2>
<form action="{{ route('teams.store', $conference->id) }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nom de l'équipe" required>

    <label for="history">Histoire de l'équipe :</label>
    <textarea name="history" placeholder="Écrivez l'histoire de l'équipe ici..." rows="4"></textarea>

    <button type="submit">Ajouter</button>
</form>