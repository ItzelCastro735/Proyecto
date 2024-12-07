<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Lista de productos</p>
  
    <table class="table table-bordered">
        <tr>
            <th>title</th><tr></tr>
            <th>Zanahoria</th><tr></tr>
            <th>Fresa</th><tr></tr>
            <th>category</th><tr></tr>
            <th>Verdura</th><tr></tr>
            <th>Fruta</th><tr></tr>
            <th>price</th><tr></tr>
            <th>$2.00</th><tr></tr>
            <th>$20.00</th><tr></tr>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->title }}</td>
            <td>{{ $user->category }}</td>
            <td>{{ $user->price }}</td>
        </tr>
        @endforeach
    </table>
  
</body>
</html>
