<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a guest</h1>
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
    <form method="post" action="{{route('visiteur.update',['visiteur'=>$visiteur])}}">
    @csrf
    @method('put')
        <div>
            <label for="">Name :</label>
            <input type="text" name="nom" placeholder="nom" value="{{$visiteur->nom}}">
        </div>
        <div>
            <label for="">Prenom :</label>
            <input type="text" name="prenom" placeholder="prenom" value="{{$visiteur->prenom}}">
        </div>
        <div>
            <label for="">Telephone :</label>
            <input type="text" name="telephone" placeholder="telephone" value="{{$visiteur->telephone}}">
        </div>
        <div>
            <input type="submit" value="Update">
        </div>
    </form>
</body>
</html>