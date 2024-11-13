<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #007bff;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .subtitle {
            text-align: center;
            font-size: 18px;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .success-message {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: .25rem;
            font-size: 20px;
            text-align: center;
        }

        .create-product-btn {
            display: block;
            width: 200px;
            margin: 0 auto 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #dee2e6;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #155724;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        td {
            background-color: #fff;
        }

        .edit-icon {
            color: #007bff;
            font-size: 1.2em;
        }

        .delete-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center">Guests</h1><br>
    <div style="font-size: large;"><i>Voici la liste des visiteurs</i></div><br>
    <div style="color: #155724; border-color: #c3e6cb; padding: 10px; margin-bottom: 20px; border: 1px solid transparent; border-radius: .25rem;font-size: 20px">
        <strong> @if (session()->has('success'))
        <div>{{session('success')}}</div>
        @endif
        </strong>
    </div>
        <div style="display: flex; justify-content: center; align-items: center;margin-bottom: 20px;">
        <a href="{{route('visiteur.create')}}" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 4px;">Create a new guest</a>
        </div>
    <div style="display: flex; justify-content: center; align-items: center;margin-bottom: 20px;">
        
        <table border="1" >
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Telephone</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($visiteurs as $visiteur)
            <tr>
                <td>{{$visiteur->id}}</td>
                <td>{{$visiteur->nom}}</td>
                <td>{{$visiteur->prenom}}</td>
                <td>{{$visiteur->telephone}}</td>
                <td>
                    <a href="{{route('visiteur.edit',['visiteur'=>$visiteur])}}">
                    <i class="fas fa-edit" style="color: blue; font-size: 1.2em; justify-content: center;display: flex; justify-content: center; align-items: center;"></i>
                    </a>
                </td>
                <td>
                    <form action="{{route('visiteur.destroy',['visiteur'=>$visiteur])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="delete-btn"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>