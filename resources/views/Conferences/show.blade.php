<link rel="stylesheet" href="{{ asset('css/conference.css') }}">

@php
    $name = strtolower($conference->name ?? '');
    if (preg_match('/\b(west|western|ouest)\b/i', $name)) {
        $isEast = false;
    } elseif (preg_match('/\b(east|eastern|est)\b/i', $name)) {
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
        alt="Logo Conférence {{ $conference->name }}" 
        class="header-logo">

    <div class="header-separator"></div>

    <h2>Ajouter une nouvelle équipe</h2>
    <form action="{{ route('teams.store', $conference->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Nom de l'équipe" required>
        <input type="file" name="logo" id="logo">
        <label for="logo" class="file-label">Choisir un logo</label>
        <button type="submit">Ajouter</button>
    </form>

    @foreach($conference->teams as $team)
        <section>
            <h2>
                @if($team->logo)
                    <img src="{{ asset('storage/' . $team->logo) }}" 
                         alt="Logo {{ $team->name }}" 
                         style="height:50px; vertical-align:middle; margin-right:10px;">
                @endif
                <a href="{{ route('teams.show', $team->id) }}">{{ $team->name }}</a>
            </h2>

            <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn" onclick="return confirm('Supprimer cette équipe ?')">
                    Supprimer l'équipe
                </button>
            </form>

            <h3>Joueurs</h3>
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

            <h3>Ajouter un joueur</h3>
            <form action="{{ route('players.store', $team->id) }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Nom du joueur" required>
                <input type="text" name="position" placeholder="Poste (ex: SG, PG)">
                <button type="submit">Ajouter</button>
            </form>
        </section>
    @endforeach
</div>
