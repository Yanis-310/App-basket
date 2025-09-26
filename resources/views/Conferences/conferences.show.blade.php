<link rel="stylesheet" href="{{ asset('css/conference.css') }}">

@php
    $name = strtolower($conference->name ?? '');
    $isEast = preg_match('/\b(east|eastern|est)\b/i', $name);
@endphp

<div class="conference {{ $isEast ? 'conference-east' : 'conference-west' }}">
    <img 
        src="{{ $isEast 
            ? 'https://upload.wikimedia.org/wikipedia/commons/9/96/Eastern_Conference_%28NBA%29_logo_2018.png' 
            : 'https://upload.wikimedia.org/wikipedia/commons/4/45/Western_Conference_%28NBA%29_logo_2018.png' }}" 
        alt="Logo Conférence {{ $conference->name }}" 
        class="header-logo">

    <h2>Équipes</h2>
    <ul>
        @foreach($conference->teams as $team)
            <li>
                @if($team->logo)
                    <img src="{{ asset('storage/' . $team->logo) }}" alt="Logo {{ $team->name }}" style="height:40px; vertical-align:middle; margin-right:8px;">
                @endif
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
    <form action="{{ route('teams.store', $conference->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Nom de l'équipe" required>
        <textarea name="history" placeholder="Écrivez l'histoire de l'équipe ici..." rows="4"></textarea>

        <label for="logo-upload" class="custom-file-upload">Choisir un logo</label>
        <input id="logo-upload" type="file" name="logo" accept="image/*">

        <button type="submit">Ajouter</button>
    </form>
</div>
