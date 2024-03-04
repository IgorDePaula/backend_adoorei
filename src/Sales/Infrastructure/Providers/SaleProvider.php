<?php

namespace Sales\Infrastructure\Providers;

use App\Models\Sale;
use Core\Application\ActionFactory;
use Core\Domain\DirectorInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Sales\Application\ActionEnum;
use Sales\Application\Actions\{CreateSale, ListSale};
use Sales\Domain\Director\SaleDirector;
use Sales\Infrastructure\Http\Controllers\{CreateSaleController, ListSaleController};
use Sales\Infrastructure\Repository\Interfaces\SaleRepositoryInterface;
use Sales\Infrastructure\Repository\SaleRepository;

class SaleProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(__DIR__ . '/../Http/routes.php');
    }

    public function register(): void
    {
        $this->app->when(ListSaleController::class)
            ->needs(ActionFactory::class)
            ->give(fn($app) => new ActionFactory(ActionEnum::class, $app));

        $this->app->when(ListSale::class)
            ->needs(SaleRepositoryInterface::class)
            ->give(fn($app) => $app->make(SaleRepository::class));

        $this->app->when(SaleRepository::class)
            ->needs(Model::class)
            ->give(Sale::class);

        $this->app->when(SaleRepository::class)
            ->needs(DirectorInterface::class)
            ->give(SaleDirector::class);

        $this->app->when(CreateSaleController::class)
            ->needs(ActionFactory::class)
            ->give(fn($app) => new ActionFactory(ActionEnum::class, $app));

        $this->app->when(CreateSale::class)
            ->needs(SaleRepositoryInterface::class)
            ->give(fn($app) => $app->make(SaleRepository::class));
    }
}
