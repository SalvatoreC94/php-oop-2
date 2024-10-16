<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pet Shop</title>
</head>

<body>
    <h1 class='text-center mb-5 mt-5'> Pet Shop</h1>
    <div class="container mt-5">
        <div class="row">
            <?php
            // Classe Category
            class Category
            {
                public string $name;
                public string $icon;

                public function __construct(string $name, string $icon)
                {
                    $this->name = $name;
                    $this->icon = $icon;
                }
            }

            // Classe Product
            class Product
            {
                public string $name;
                public float $price;
                public string $image;
                public Category $category;
                public string $type;

                public function __construct(string $name, float $price, string $image, Category $category, string $type)
                {
                    $this->name = $name;
                    $this->price = $price;
                    $this->image = $image;
                    $this->category = $category;
                    $this->type = $type;
                }
            }

            // Classe Food (Estende Product)
            class Food extends Product
            {
                public string $flavor;
                public string $weight;

                public function __construct(string $name, float $price, string $image, Category $category, string $flavor, string $weight)
                {
                    parent::__construct($name, $price, $image, $category, 'Cibo');
                    $this->flavor = $flavor;
                    $this->weight = $weight;
                }
            }

            // Classe Toy (Estende Product)
            class Toy extends Product
            {
                public string $material;
                public string $size;

                public function __construct(string $name, float $price, string $image, Category $category, string $material, string $size)
                {
                    parent::__construct($name, $price, $image, $category, 'Gioco');
                    $this->material = $material;
                    $this->size = $size;
                }
            }

            // Classe Bed (Estende Product)
            class Bed extends Product
            {
                public string $dimensions;
                public string $material;

                public function __construct(string $name, float $price, string $image, Category $category, string $dimensions, string $material)
                {
                    parent::__construct($name, $price, $image, $category, 'Cuccia');
                    $this->dimensions = $dimensions;
                    $this->material = $material;
                }
            }

            // Creazione delle categorie
            $dogCategory = new Category("Cani", "🐶");
            $catCategory = new Category("Gatti", "🐱");

            // Creazione dei prodotti
            $products = [
                new Food("Crocchette per Cani", 19.99, "https://www.gardenbedettishop.com/8680-large_default/crocchette-per-cani-monge-puppy-junior-agnello-e-riso-12-kg.jpg", $dogCategory, "Manzo", "5kg"),
                new Toy("Pallina per Gatti", 5.99, "https://m.media-amazon.com/images/I/61csTsGuauL._AC_SY300_.jpg", $catCategory, "Plastica", "Piccola"),
                new Bed("Cuccia per Cani", 49.99, "https://m.media-amazon.com/images/I/71OLZkDHFWL._AC_SY300_.jpg", $dogCategory, "100x70cm", "Cotone")
            ];

            // Renderizzazione delle card tramite foreach
            foreach ($products as $product) {
                echo "
                <div class='col-md-4 mb-4'>
                    <div class='card' style='width: 18rem; height: 350px; object-fit: cover;'>
                        <img src='{$product->image}' class='card-img-top' alt='{$product->name}' style='height: 200px; object-fit: cover;'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$product->name}</h5>
                            <p class='card-text'>Prezzo: " . number_format($product->price, 2) . "€</p>
                            <p class='card-text'>Categoria: {$product->category->name} <span>{$product->category->icon}</span></p>
                            <p class='card-text'>Tipo: {$product->type}</p>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>