<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
</head>
<body>

    <center>
        <h3>Pelayanan</h3>
    </center>
	<table class='table table-bordered'>
        <thead>
            <tr>
                <th>Pelayan</th>
                <th>Category Reservation</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pelayanans as $pelayanan)
            <tr>
            <form method="POST" action="{{route('admin.pelayanan.update')}}">
                @csrf
                <td>{{$pelayan->jemaat->nama}} - {{$pelayan->CategoryPelayan->category_name}}</td>
                <td>{{$pelayanan->CategoryReservation->name}}</td>
                <td>{{$pelayanan->CategoryReservation->tanggal}}</td>
                
            </tr>
        @endforeach
        </tbody>
    </table>
	
    
    <center>
        <h3>Lagu Ibadah</h3>
    </center>
	<table class='table table-bordered'>
    <thead>
        <tr>
            <th>Lagu ID</th>
            <th>No</th>
            <th>Link Youtube</th>
            <th>Category Reservation</th>
            <th>Tanggal</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($laguIbadahs as $laguIbadah)
            <tr>
            <form method="POST" action="{{route('admin.laguIbadah.update')}}">
                @csrf
                <td>{{$laguIbadah->lagu->judul}}</td>
                <td>{{$laguIbadah->lagu->category}}</td>
                <td><a href="{{$laguIbadah->lagu->link_youtube}}">{{$laguIbadah->lagu->link_youtube}}</a></td>
                <td>{{$laguIbadah->category_reservation_id}} - {{$laguIbadah->CategoryReservation->name}}</td>
                <td>{{$laguIbadah->CategoryReservation->tanggal}}</td>
                
            </tr>
        @endforeach
        </tbody>
    </table>
    
    <center>
        <h3>{{ $title }}</h3>
    </center>
	<table class='table table-bordered'>
    <thead>
        <tr>
            <th>ID Booking</th>
            <th>Category Reservation</th>
            <th>Tanggal</th>
            <th>Jemaat</th>
            <th>Jumlah Orang</th>
            <th>Note</th>
        </tr>
    </thead>
    <tbody>
    @foreach($reservationspdf as $reservation)
        <tr>
            <td>{{$reservation->id}}-{{$reservation->jemaat_id}}</td>
            <td>{{$reservation->category_reservation_id}} - {{$reservation->categoryReservation->name}}</td>
            <td>{{$reservation->categoryReservation->tanggal}}</td>
            <td>{{$reservation->jemaat->nama}}</td>
            <td>{{$reservation->jumlah_orang}}</td>
            <td>{{$reservation->note}}</td>
            
        </tr>
    @endforeach
    </tbody>
    </table>
 
</body>
</html>