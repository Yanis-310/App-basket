<h1>Conférence : {{ $conference->name }}</h1>

<h2>Ajouter une nouvelle équipe</h2>
<form action="{{ route('teams.store', $conference->id) }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nom de l'équipe" required>
    <button type="submit">Ajouter</button>
</form>

@foreach($conference->teams as $team)
    <section style="border:1px solid #ccc; padding:10px; margin-bottom:20px;">
        <h2>{{ $team->name }}</h2>

        <!-- Supprimer l'équipe -->
        <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Supprimer cette équipe ?')">Supprimer l'équipe</button>
        </form>

        <h3>Joueurs</h3>
        @if($team->players->isEmpty())
            <p>Aucun joueur pour le moment.</p>
        @else
            <ul>
                @foreach($team->players as $player)
                    <li>{{ $player->name }} ({{ $player->position ?? 'N/A' }})</li>
                @endforeach
            </ul>
        @endif

        <h3>Ajouter un joueur</h3>
        <form action="{{ route('players.store', $team->id) }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nom du joueur" required>
            <input type="text" name="position" placeholder="Poste (ex: SG, PG)">
            <button type="submit">Ajouter</button>
        </form>
    </section>
@endforeach