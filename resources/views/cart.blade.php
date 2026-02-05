<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Panier</title>

    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(120deg, #f4f2fb, #ece9f7);
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin: 30px 0;
            color: #3b2f63;
        }

        .cart-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item strong {
            color: #3b2f63;
        }

        .remove-btn {
            padding: 8px 14px;
            background: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 20px;
            font-size: 14px;
            transition: 0.3s;
        }

        .remove-btn:hover {
            background: #b52a37;
        }

        .empty {
            text-align: center;
            color: #777;
        }

        .actions {
            text-align: center;
            margin-top: 25px;
        }

        .back-btn {
            padding: 12px 22px;
            background: #6a5acd;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #5848b8;
        }
    </style>
</head>
<body>

<h1>Mon panier</h1>

<div class="cart-container">

    @if(!empty($cart) && count($cart) > 0)

      @foreach($cart as $item)
    <div class="cart-item">
        <div>
            <strong>{{ $item['name'] }}</strong>
            - {{ number_format($item['price'], 0, ',', ' ') }} FCFA
        </div>

        <a href="{{ route('cart.remove', $item['id']) }}" class="remove-btn">
            Supprimer
        </a>
    </div>
@endforeach


    @else
        <p class="empty">Votre panier est vide.</p>
    @endif

    <div class="actions">
        <a href="{{ route('products.index') }}" class="back-btn">
            ⬅ Retour aux produits
        </a>
    </div>

</div>

</body>
</html>
