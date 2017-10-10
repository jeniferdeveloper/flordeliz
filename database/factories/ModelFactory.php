<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(FlorDeLiz\Models\User::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(1234567),
        'remember_token' => str_random(10),
        'img_src' => $faker->imageUrl($width = 200, $height = 200, 'people', true, 'Faker', true)
    ];
});

$factory->define(FlorDeLiz\Models\Role::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    return [
        'name' => $faker->jobTitle,
        'description' => $faker->word

    ];
});

$factory->define(FlorDeLiz\Models\Produto::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));

    return [
        'nome' => $faker->jobTitle,
        'descricao' => $faker->text,
        'preco' => rand(10, 100),
        'tamanho' => rand('34', '44'),
        'barcode' => $faker->isbn13,
        'qtd' => $faker->randomNumber,
        'img_src' => $faker->imageUrl($width = 800, $height = 600, 'nightlife', true, 'Faker', true)
    ];
});


$factory->define(FlorDeLiz\Models\Categoria::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->domainName
    ];
});


$factory->define(FlorDeLiz\Models\Cliente::class, function (Faker\Generator $faker) {
    $fakerPTBR = new Faker\Generator();
    $fakerPTBR->addProvider(new Faker\Provider\pt_BR\Person($fakerPTBR));
    $fakerPTBR->addProvider(new Faker\Provider\pt_BR\Company($fakerPTBR));
    return [
        'telefone' => $faker->phoneNumber,
        'cpf' => $fakerPTBR->cpf(false),
        'cnpj' => $fakerPTBR->cnpj(false)

    ];
});


$factory->define(FlorDeLiz\Models\Pedido::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    return [
//        'client_id' => $faker->numberBetween($min = 1, $max = 10),
//        'total' => rand(50, 120),
//        'status' => rand(1, 7),
//        'user_deliveryman_id' => $faker->randomElement($array = array(null, 13, 14), $count = 1)

    ];
});


$factory->define(FlorDeLiz\Models\PedidoItem::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    return [
//        'price'  => $faker->randomFloat(2,0,0),
//        'qtd'  => $faker->randomDigitNotNull(),


    ];
});

$factory->define(FlorDeLiz\Models\Producao::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    return [


    ];
});

$factory->define(FlorDeLiz\Models\Cupom::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    return [
        'description' => $faker->catchPhrase,
        'validate' => $faker->dateTimeInInterval($startDate = date_default_timezone_get(), $interval = '+ 5 days', $timezone = date_default_timezone_get()),//$faker->date($format = 'd-m-Y', $max = 'now'),
        'code' => strtoupper(substr($faker->md5, 0, 6)),
        'value' => $faker->numberBetween($min = 5, $max = 90),
        'used' => rand(0, 1)

    ];
});

$factory->define(FlorDeLiz\Models\OAuthClient::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    return [

    ];
});