<?php

namespace FlorDeLiz\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //Injeta na dependência o serviço CategoriaRepositoryEloquent
        //s		empre que chamar o CategoriaRepository
        //### CATEGORY ###
        $this->app->bind(
            'FlorDeLiz\Repositories\CategoryRepository',
            'FlorDeLiz\Repositories\CategoryRepositoryEloquent'
        );

        //### PRODUCT ###
        $this->app->bind(
            'FlorDeLiz\Repositories\ProductRepository',
            'FlorDeLiz\Repositories\ProductRepositoryEloquent'
        );

        //### USER ###
        $this->app->bind(
            'FlorDeLiz\Repositories\UserRepository',
            'FlorDeLiz\Repositories\UserRepositoryEloquent'
        );

        //### CLIENT ###
        $this->app->bind(
            'FlorDeLiz\Repositories\ClientRepository',
            'FlorDeLiz\Repositories\ClientRepositoryEloquent'
        );

        //### ORDER ###
        $this->app->bind(
            'FlorDeLiz\Repositories\OrderRepository',
            'FlorDeLiz\Repositories\OrderRepositoryEloquent'
        );

        //### ORDER  ITEM ###
        $this->app->bind(
            'FlorDeLiz\Repositories\OrderItemRepository',
            'FlorDeLiz\Repositories\OrderItemRepositoryEloquent'
        );

         //### ORDER  ITEM ###
        $this->app->bind(
            'FlorDeLiz\Repositories\RoleRepository',
            'FlorDeLiz\Repositories\RoleRepositoryEloquent'
        );

        //### PEDIDOS ###
        $this->app->bind(
            'FlorDeLiz\Repositories\PedidoRepository',
            'FlorDeLiz\Repositories\PedidoRepositoryEloquent'
        );

        //### PEDIDOS ITENS ###
        $this->app->bind(
            'FlorDeLiz\Repositories\PedidoItemsRepository',
            'FlorDeLiz\Repositories\PedidoItemsRepositoryEloquent'
        );

        //### CUPOM ###
        $this->app->bind(
            'FlorDeLiz\Repositories\CupomRepository',
            'FlorDeLiz\Repositories\CupomRepositoryEloquent'
        );



         //### TESTE ###
        $this->app->bind(
            'FlorDeLiz\Repositories\TesteRepository',
            'FlorDeLiz\Repositories\TesteRepositoryEloquent'
        );
        //### PRODUÇÃO ###
        $this->app->bind(
            'FlorDeLiz\Repositories\ProducaoRepository',
            'FlorDeLiz\Repositories\ProducaoRepositoryEloquent'
        );
    }
}
