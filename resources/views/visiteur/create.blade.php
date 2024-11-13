<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create a new guest</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('visiteur.store')}}">
    @csrf
   
        <div>
            <label for="">Name :</label>
            <input type="text" name="nom" value="nom" >
        </div>
        <div>
            <label for="">Prenom :</label>
            <input type="text" name="prenom" value="prenom" >
        </div>
        <div>
            <label for="">Telephone :</label>
            <input type="text" name="telephone"  value="telephone">
        </div>
        <div>
            <input type="submit" value="save a new guest">
        </div>
    </form>
</body>
</html>