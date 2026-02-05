{{-- resources/views/index.blade.php --}}

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>

    <style>
        :root {
            --primary: #6d5dfc;        /* violet bleuté */
            --secondary: #8b7cff;
            --background: #f5f4ff;
            --card-bg: #ffffff;
            --text: #2d2d2d;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", Arial, sans-serif;
            background-color: var(--background);
            color: var(--text);
            display: flex;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 1100px;
            padding: 40px 20px;
            text-align: center;
        }

        h1 {
            margin-bottom: 25px;
            font-size: 2.2rem;
        }

        .cart-button {
            display: inline-block;
            margin-bottom: 35px;
            padding: 10px 20px;
            background-color: var(--primary);
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }

        .cart-button:hover {
            background-color: var(--secondary);
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 25px;
            justify-items: center;
        }

        .product-card {
            background-color: var(--card-bg);
            border-radius: 15px;
            padding: 15px;
            width: 100%;
            max-width: 240px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        .product-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .product-card h3 {
            margin: 10px 0 5px;
            font-size: 1.1rem;
        }

        .product-card p {
            margin: 0 0 15px;
            font-weight: 600;
            color: var(--primary);
        }

        .button {
            display: inline-block;
            padding: 8px 18px;
            background-color: var(--primary);
            color: #fff;
            text-decoration: none;
            border-radius: 20px;
            font-size: 0.9rem;
            transition: background-color 0.2s ease;
        }

        .button:hover {
            background-color: var(--secondary);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Produits disponibles</h1>

    <a href="{{ route('cart.index') }}" class="cart-button">
        Voir mon panier
    </a>

    <div class="products">
        @php
            $images = ['img1.jpg', 'img2.jpg', 'img3.jpg', 'img4.jpg'];
        @endphp

        @foreach ($products as $key => $product)
            <div class="product-card">
                <img src="{{ asset('images/' . $images[$key % count($images)]) }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->price }} €</p>
                <a href="{{ route('cart.add', $product->id) }}" class="button">
                    Ajouter au panier
                </a>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
