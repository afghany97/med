<?php

namespace App\Providers;

use App\Repositories\Ads\AdsRepositoryInterface;
use App\Repositories\Ads\MysqlAdsRepository;
use App\Repositories\Brands\BrandsRepositoryInterface;
use App\Repositories\Brands\MysqlBrandsRepository;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Categories\MysqlCategoriesRepository;
use App\Repositories\Products\MysqlProductsRepository;
use App\Repositories\Products\ProductsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    private array $repositoriesMapping = [
        CategoryRepositoryInterface::class => MysqlCategoriesRepository::class,
        AdsRepositoryInterface::class => MysqlAdsRepository::class,
        BrandsRepositoryInterface::class => MysqlBrandsRepository::class,
        ProductsRepositoryInterface::class => MysqlProductsRepository::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositoriesMapping as $contract => $concrete) {
            $this->app->bind($contract, $concrete);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
