<h1>Équipe : {{ $team->name }}</h1>

<h2>Joueurs</h2>
<ul>
    @foreach($team->players as $player)
        <li>{{ $player->name }} ({{ $player->position ?? 'N/A' }})</li>
    @endforeach
</ul>

<h3>Ajouter un joueur</h3>
<form action="{{ route('players.store', $team->id) }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nom du joueur" required>
    <input type="text" name="position" placeholder="Poste (ex: SG, PG)">
    <button type="submit">Ajouter</button>
</form>