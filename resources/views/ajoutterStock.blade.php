<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ url('/ajoutterStock') }}" method="POST" enctype="multipart/form-data">

<select name="nom" id="">
        @foreach($prod as $p)
            <option value="{{$p->nom}}">{{$p->nom}}</option>
        @endforeach
</select>
    <select name="q" id="">
        @foreach($prod as $p)
            <option value="{{$p->quantite}}">{{$p->nom}}</option>
        @endforeach
    </select>
    <input type="text" nom="quantite" >
    <input type="submit" value="envoyer">
</form>
</body>
</html>
