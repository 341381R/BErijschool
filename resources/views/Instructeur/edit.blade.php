@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="col-md-8">
            <h2>{{ $title  }}</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('Instructeur.index', $instructeur->VoertuigId) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <select name="Instructeur">
                    @foreach ($voertuig as $naam)
                        <option 
                            value="{{ $naam->Naam }}"
                            {{ $instructeur->Naam == $voertuig->Naam ? 'selected' : '' }}
                            >
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
            <a href="{{ route('Allergenen.index') }}" class="btn btn-secondary">Annuleren</a>
        </form>
        </div>
    </div>
</body>
</html>