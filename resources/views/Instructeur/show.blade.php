@vite(['resources/css/app.css', 'resources/js/app.js']);
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet"/>
        <title>Details</title>
    </head>
    <body>
        <div class="container d-flex justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-3">{{ $title }}</h2>
                <dl class="row">
                    <h2 class="col-sm-12">Naam: {{ $instructeur[0]->Naam}}</h>
                    <h2 class="col-sm-12 ">Datum in dienst: {{ $instructeur[0]->DatumInDienst}}</h2>
                    <h2 class="col-sm-12 ">Aantal sterren: {{ $instructeur[0]->AantalSterren}}</h2>


                    <a href="{{ route('Instructeur.index') }}" class="btn btn-primary mt-2">Toevoegen voertuig</a>
                </dl>
                <table class="table">
                    <thead>
                        <th>Type voertuig</th>
                        <th>Type</th>
                        <th>Kenteken</th>
                        <th>Bouwjaar</th>
                        <th>Brandstof</th>
                        <th>Rijbewijscategorie</th>
                        <th>wijzigen</th>
                        <th>verwijderen</th>
                    </thead>
                    <tbody>
                        @foreach ($instructeur as $voertuig)
                        <tr>
                            <td>{{ $voertuig->TypeVoertuig }}</td>
                            <td>{{ $voertuig->Type }}</td>
                            <td>{{ $voertuig->Kenteken }}</td>
                            <td>{{ $voertuig->Bouwjaar }}</td>
                            <td>{{ $voertuig->Brandstof }}</td>
                            <td>{{ $voertuig->Rijbewijscategorie }}</td>
                            <td>
                                <form action="{{ route('Instructeur.edit', $voertuig->VoertuigId) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-large"><i class="bi bi-pencil"></i></button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('Instructeur.destroy', $voertuig->VoertuigId) }}" method="POST" 
                                    onsubmit="return confirm('weet u zeker dat u dit voertuig wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </table>

                <div class="mt-3 d-flex gap-2">
                    <a href="{{ route('Instructeur.index') }}" class="btn btn-secondary btn-sm ms-auto">Terug</a>
                </div>
            </div>
        </div>
    </body>
</html>