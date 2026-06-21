@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<x-app-layout>
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
            <meta http-equiv="refresh" content="3;url={{ route('Instructeur.index') }}">
            @endif

        <div class="mt-3">
            Aantal Instructeurs: <?php echo count($instructeurs); ?>
        </div>

        <table class="table">
            <thead>
                <th>Naam</th>
                <th>Mobiel</th>
                <th>Datum in dienst</th>
                <th>Aantal sterren</th>
                <th>Voertuigen</th>
                <th>Ziekte/Verlof</th>
            </thead>
            <tbody>
                
                @forelse ($instructeurs as $instructeur)
                <tr>
                    <td>{{ $instructeur->Naam }}</td>
                    <td>{{ $instructeur->Mobiel }}</td>
                    <td>{{ $instructeur->DatumInDienst }}</td>
                    <td>
                        @for ($i = 0; $i < 5; $i++)
                            @if ($i <  $instructeur->AantalSterren )
                                <span><i class="bi bi-star-fill"></i></span>
                            @else
                                <span><i class="bi bi-star"></i></span>
                            @endif
                        @endfor
                    </td>
                     <td>
                        <form action="{{ route('Instructeur.show', $instructeur->Id) }}" method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-md"><i class="bi bi-car-front-fill"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('Instructeur.InstructeurStatusToggle', [
                                'id' => $instructeur->Id
                                , 'naam' => $instructeur->Naam
                                , 'status' => $instructeur->Status]) }}" method="POST" >
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-lg">@if($instructeur->Status)
                                    <i class="bi bi-hand-thumbs-up-fill"></i>
                                    @else
                                    <i class="bi bi-bandaid"></i>
                                    @endif
                                </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">Er zijn geen instructeurs in deze rijschool.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
</x-app-layout>