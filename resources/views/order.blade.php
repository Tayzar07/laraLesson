<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        section {
            display: flex;
            flex-wrap: wrap;
        }

        .container {
            border-radius: 15px;
            border: 1px solid rgba(0, 0, 0, 0.258);
            width: 250px;
            padding: 5px;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.444);
            margin: 10px;
        }
    </style>
</head>

<body>
    <h2>Customer Order List</h2>
    <section>
        @foreach ($list as $list)
        <div class="container">
            <h3>OrderID: {{$list->OrderID}}</h3>
            <h3>CustomerID: {{$list->CustomerID}}</h3>
            <h3>CustomerName: {{$list->CustomerName}}</h3>
            <h3>City: {{$list->City}}</h3>
            <h3>Country: {{$list->Country}}</h3>
            <h3>Shipper Name: {{$list->ShipperName}}</h3>
        </div>
        @endforeach
    </section>
</body>

</html>
