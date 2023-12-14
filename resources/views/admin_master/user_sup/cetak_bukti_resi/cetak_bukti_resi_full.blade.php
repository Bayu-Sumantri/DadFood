<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h3> Data User</h3>
    </hr>
    <table style="width:100%">
        <thead>
            <tr>
                <td bgcolor="red" width="5%">Id</td>
                <td bgcolor="yellow" width="5%" class="center">Nama</td>
                <td bgcolor="yellow" width="5%" class="center">Email</td>
                <td bgcolor="yellow" width="5%" class="center">Number Phone</td>
                <td bgcolor="yellow" width="5%" class="center">Guest</td>
                <td bgcolor="red" width="5%" class="center">Date Reservasi</td>
                <td bgcolor="red" width="5%" class="center">Date Create</td>
            </tr>
        </thead>
        <tbody>

                <tr>
                    <td style="text-align: center">{{ $booking->user->id }}</td>
                    <td style="text-align: center">{{ $booking->user->name  }}</td>
                    <td style="text-align: center">{{ $booking->user->email  }}</td>
                    <td style="text-align: center">{{ $booking->number_phone }}</td>
                    <td style="text-align: center">{{ $booking->guests }}</td>
                    <td style="text-align: center">{{ $booking->tanggal_reservasi }}</td>
                    <td style="text-align: center">{{ $booking->created_at }}</td>
                </tr>

        </tbody>
    </table>
    <br>
    <p align="right">
        Date : {{ $booking->created_at }} </br>
        Personal In Charge</br>

        @if (Auth::check())
            <span class="hidden-xs" fontsize=15>{{ Auth::user()->level }}</span>
        @endif
        </br>
        </br>

        </br>
        </br>
        @if (Auth::check())
            <span class="hidden-xs">({{ Auth::user()->name }} {{ auth()->user()->getRoleNames()->first() }})</span>
        @endif
</body>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</html>
