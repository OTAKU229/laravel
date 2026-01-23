<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .cart-item {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .remove-button {
            padding: 5px 10px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .remove-button:hover {
            background-color: #b02a37;
        }
        .back-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Mon Panier</h1>

    @if(count($cart) > 0)
        @foreach($cart as $product)
            <div class="cart-item">
                <div>
                    <strong>{{ $product->name }}</strong> - {{ $product->price }} €
                </div>
                <a href="{{ route('cart.remove', $product->id) }}" class="remove-button">Supprimer</a>
            </div>
        @endforeach
    @else
        <p>Votre panier est vide.</p>
    @endif

  <a href="{{ route('products.index') }}" class="back-button">Retour aux produits</a>

</body>
</html>
