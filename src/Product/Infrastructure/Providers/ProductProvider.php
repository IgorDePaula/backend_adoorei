<?php

namespace Product\Infrastructure\Providers;

use App\Models\Product;
use Core\Application\ActionFactory;
use Core\Domain\DirectorInterface;
use Core\Infrastructure\Repository\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Product\Application\ActionEnum;
use Product\Application\Actions\ListProduct;
use Product\Domain\Director\ProductDirector;
use Product\Infrastructure\Http\Controllers\ListProductController;
use Product\Infrastructure\Repository\ProductRepository;

class ProductProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(__DIR__ . '/../Http/routes.php');
    }

    public function register(): void
    {
        $this->app->when(ListProductController::class)
            ->needs(ActionFactory::class)
            ->give(fn($app) => new ActionFactory(ActionEnum::class, $app));

        $this->app->when(ListProduct::class)
            ->needs(RepositoryInterface::class)
            ->give(fn($app) => $app->make(ProductRepository::class));

        $this->app->when(ProductRepository::class)
            ->needs(Model::class)
            ->give(Product::class);

        $this->app->when(ProductRepository::class)
            ->needs(DirectorInterface::class)
            ->give(ProductDirector::class);
    }
}
