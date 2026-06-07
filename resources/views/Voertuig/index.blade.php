@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet"/>
    <title>instructeur pagina</title>
</head>
<body>
    <div class="container">

        <h1>{{ $title }}</h1>
    
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }} 
                <button type="button" class="btn-close" aria-label="sluiten" data-bs-dismiss="alert"></button>
            </div>
            <meta http-equiv="refresh" content="3;url={{ route('Voertuig.index') }}">
        @endif
         @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="sluiten"></button>
            </div>
            <meta http-equiv="refresh" content="3;url={{ route('Voertuig.index') }}">
        @endif

        <table class="table">
            <thead>
                <th>Type voertuig</th>
                <th>Type</th>
                <th>Kenteken</th>
                <th>Bouwjaar</th>
                <th>Brandstof</th>
                <th>Rijbewijscategorie</th>
                <th>Instructeur naam</th>
                <th>Verwijderen</th>
            </thead>
            <tbody>
                
                @forelse ($voertuigen as $voertuig)
                <tr>
                    <td>{{ $voertuig->TypeVoertuig }}</td>
                    <td>{{ $voertuig->Type }}</td>
                    <td>{{ $voertuig->Kenteken }}</td>
                    <td>{{ $voertuig->Bouwjaar }}</td>
                    <td>{{ $voertuig->Brandstof }}</td>
                    <td>{{ $voertuig->Rijbewijscategorie }}</td>
                    <td>{{ $voertuig->Naam }}</td>
                     <td>
                        <form action="{{ route('Voertuig.index', ['id' => $voertuig->VoertuigId, 'isActief' => $voertuig->IsActief]) }}" method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">Er zijn geen voertuigen in deze rijschool.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>