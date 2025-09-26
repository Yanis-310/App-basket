<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Conférences NBA</title>
    <link rel="stylesheet" href="{{ asset('css/styleindex.css') }}">
</head>

<body>
    <div class="container">
        <img src="https://static.vecteezy.com/system/resources/previews/015/863/585/non_2x/nba-logo-on-transparent-background-free-vector.jpg"
            alt="NBA Logo" class="logo">

        <div class="buttons">
            <a href="{{ route('conferences.show', 1) }}" class="btn east">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Eastern_Conference_%28NBA%29_logo_2018.png"
                    alt="Logo Est" class="btn-logo">
            </a>

            <a href="{{ route('conferences.show', 2) }}" class="btn west">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/45/Western_Conference_%28NBA%29_logo_2018.png"
                    alt="Logo Ouest" class="btn-logo">
            </a>
        </div>
    </div>
</body>

</html>