<link rel="stylesheet" href="{{ asset('css/team.css') }}">

@php
    $confName = strtolower($team->conference->name ?? '');
    if (preg_match('/\b(west|western|ouest)\b/i', $confName)) {
        $isEast = false;
    } elseif (preg_match('/\b(east|eastern|est)\b/i', $confName)) {
        $isEast = true;
    } else {
        $isEast = true;
    }
@endphp

<div class="conference {{ $isEast ? 'conference-east' : 'conference-west' }}">
    <img 
        src="{{ $isEast 
            ? 'https://upload.wikimedia.org/wikipedia/commons/9/96/Eastern_Conference_%28NBA%29_logo_2018.png' 
            : 'https://upload.wikimedia.org/wikipedia/commons/4/45/Western_Conference_%28NBA%29_logo_2018.png' }}" 
        alt="Logo Conférence {{ $team->conference->name ?? '' }}" 
        class="header-logo">

    <div class="header-separator"></div>

    <h1>
        @if($team->logo)
            <img src="{{ asset('storage/' . $team->logo) }}" 
                 alt="Logo {{ $team->name }}" 
                 style="height:60px; vertical-align:middle; margin-right:10px;">
        @endif
        {{ $team->name }}
    </h1>

    <section>
        <h2>Histoire de l'équipe</h2>
        <p>
            {{ $team->history ?? "L'histoire de cette équipe n'a pas encore été ajoutée." }}
        </p>
    </section>

    <section>
        <h2>Joueurs</h2>
        @if($team->players->isEmpty())
            <p>Aucun joueur pour le moment.</p>
        @else
            <ul>
                @foreach($team->players as $player)
                    <li>
                        {{ $player->name }} ({{ $player->position ?? 'N/A' }})
                        <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('Supprimer ce joueur ?')">
                                Supprimer
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </section>

    <section>
        <h2>Ajouter un joueur</h2>
        <form action="{{ route('players.store', $team->id) }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nom du joueur" required>
            <input type="text" name="position" placeholder="Poste (ex: SG, PG)">
            <button type="submit">Ajouter</button>
        </form>
    </section>
</div>
