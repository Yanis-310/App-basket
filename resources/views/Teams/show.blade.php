<h1>Équipe : {{ $team->name }}</h1>

<h2>Histoire de l'équipe</h2>
<p>
    {{ $team->history ?? "L'histoire de cette équipe n'a pas encore été ajoutée." }}
</p>

<h2>Joueurs</h2>
@if($team->players->isEmpty())
    <p>Aucun joueur pour le moment.</p>
@else
    <ul>
        @foreach($team->players as $player)
            <li>{{ $player->name }} ({{ $player->position ?? 'N/A' }})</li>
        @endforeach
    </ul>
@endif