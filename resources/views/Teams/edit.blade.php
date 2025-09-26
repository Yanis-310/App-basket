<h1>Modifier l'équipe : {{ $team->name }}</h1>

<form action="{{ route('teams.update', $team->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Nom de l'équipe :</label>
    <input type="text" name="name" value="{{ $team->name }}" required>

    <label for="history">Histoire de l'équipe :</label>
    <textarea name="history" rows="5">{{ $team->history }}</textarea>

    <button type="submit">Mettre à jour</button>
</form>

<a href="{{ route('teams.show', $team->id) }}">⬅ Retour à l'équipe</a>