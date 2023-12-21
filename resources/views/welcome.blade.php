<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Call Report - ESPAS</title>
    <link type="text/css" media="screen" rel='stylesheet' href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <link href="img/favicon-32x32.png" rel="icon">
</head>

<body>
    <header class="header-bg">
        @include('xml')
        <script>
            console.log('Hello from Blade!');
        </script>

        <nav class="navbar">
            <a href="index.php">
                <img src="img/espas_logo.svg" alt="espas logo" class="espas_logo">
            </a>
            <div class="currentDate">
                <div class="todayDate"></div>
                <div class="timeNow"></div>
            </div>
        </nav>

        <div class="nav-buttons">
            {!! Form::open() !!}
            {!! Form::select('customer', ['default' => 'Select Customer'] + $customerOptions, $selectedSubscriber, [
                'id' => 'customerButton',
                'class' => 'buttons btn-lg custom-select',
            ]) !!}

            {!! Form::close() !!}
            <button class="buttons btn-lg" id="startButton">Select starting Date</button>
            <button class="buttons btn-lg" id="endButton">Select end Date</button>
        </div>
    </header>
        <table>
    <thead>
        <tr>
            <th>SubscriberName</th>
            <th>DialledNumber</th>
            <th>Date</th>
            <th>Time</th>
            <th>RingingDuration</th>
            <th>CallDuration</th>
            <th>Type</th>
            <th>CallType</th>
        </tr>
    </thead>
    <tbody>
        @if(count($daten)> 0)
        @foreach ($daten as $datensatz)
            <tr>
                <td>{{ $datensatz->SubscriberName }}</td>
                <td>{{ $datensatz->DialledNumber }}</td>
                <td>{{ $datensatz->Date }}</td>
                <td>{{ $datensatz->Time }}</td>
                <td>{{ $datensatz->RingingDuration }}</td>
                <td>{{ $datensatz->CallDuration }}</td>
                <td>{{ $datensatz->Type }}</td>
                <td>{{ $datensatz->CallType }}</td>
            </tr>
        @endforeach
        @endif
    </tbody>
</table>
<div class="pagination-container">
    {{$daten->links()}}
</div>
   

    @yield('content')

</body>

</html>
