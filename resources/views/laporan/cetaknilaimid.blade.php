<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lapor Mid Semester {{$santriwustha->namaLengkap}} {{$periode->semester}} {{$periode->tahun}}</title>
</head>
<body>
    @foreach ($nilaiaktif as $nilai)
    {{$nilai->mapel->namaMapel}} 
    {{$nilai->uts}} <br>

    @endforeach
</body>
</html>