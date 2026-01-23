{{-- resources/views/index.blade.php --}}

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .product-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            width: 200px;
            text-align: center;
        }

        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .button {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .cart-button {
            margin-bottom: 20px;
            padding: 8px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .cart-button:hover {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>

    <h1>Produits disponibles</h1>

    <a  href="{{ route('cart.index') }}" class="cart-button" >Voir mon panier</a>

    <div class="products">
        @php
            // On crée un tableau associant chaque produit à une image
            $images = ['img1.jpg', 'img2.jpg', 'img3.jpg', 'img4.jpg'];
        @endphp

        @foreach ($products as $key => $product)
            <div class="product-card">
                <img src="{{ asset('images/' . $images[$key % count($images)]) }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->price }} €</p>
                <a href="{{ route('cart.add', $product->id) }}" class="button">Ajouter au panier</a>
            </div>
        @endforeach
    </div>

</body>
</html>
