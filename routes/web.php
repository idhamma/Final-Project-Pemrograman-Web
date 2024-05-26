<?php

use Filament\Facades\Filament;
use Filament\Http\Controllers\Auth\EmailVerificationController;
use Filament\Http\Controllers\Auth\LogoutController;
use Filament\Http\Controllers\RedirectToHomeController;
use Filament\Http\Controllers\RedirectToTenantController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Filament\Panel;
use App\Providers\Filament\AdminPanelProvider;

use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

//default or main page
Route::get('/', function () {
    return view('homepage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//route navigation bar

//public accessS
Route::get('/homepage', function () {
    return view('homepage');
})->name('homepage');

Route::get('/aboutus', function () {
    return view('aboutUs');
})->name('aboutus');

Route::get('/motorcycles', function () {
    return view('motorcycles');
})->name('motorcycles');


Route::get('/transactions', function () {
    return view('transactions');
})->middleware(['auth', 'verified'])->name('transactions');


Route::name('filament.')
    ->group(function () {
        foreach (Filament::getPanels() as $panel) {
            /** @var \Filament\Panel $panel */
            $panelId = $panel->getId();
            $hasTenancy = $panel->hasTenancy();
            $tenantRoutePrefix = $panel->getTenantRoutePrefix();
            $tenantDomain = $panel->getTenantDomain();
            $tenantSlugAttribute = $panel->getTenantSlugAttribute();
            $domains = $panel->getDomains();

            foreach ((empty($domains) ? [null] : $domains) as $domain) {
                Route::domain($domain)
                    ->middleware($panel->getMiddleware())
                    ->name("{$panelId}.")
                    ->prefix($panel->getPath())
                    ->group(function () use ($panel, $hasTenancy, $tenantDomain, $tenantRoutePrefix, $tenantSlugAttribute) {
                        if ($routes = $panel->getRoutes()) {
                            $routes($panel);
                        }

                        Route::name('auth.')->group(function () use ($panel) {
                            if ($panel->hasLogin()) {
                                Route::get($panel->getLoginRouteSlug(), $panel->getLoginRouteAction())
                                    ->name('login');
                            }

                            if ($panel->hasPasswordReset()) {
                                Route::name('password-reset.')
                                    ->prefix($panel->getResetPasswordRoutePrefix())
                                    ->group(function () use ($panel) {
                                        Route::get($panel->getRequestPasswordResetRouteSlug(), $panel->getRequestPasswordResetRouteAction())
                                            ->name('request');
                                        Route::get($panel->getResetPasswordRouteSlug(), $panel->getResetPasswordRouteAction())
                                            ->middleware(['signed'])
                                            ->name('reset');
                                    });
                            }

                            if ($panel->hasRegistration()) {
                                Route::get($panel->getRegistrationRouteSlug(), $panel->getRegistrationRouteAction())
                                    ->name('register');
                            }
                        });

                        Route::middleware($panel->getAuthMiddleware())
                            ->group(function () use ($panel, $hasTenancy, $tenantDomain, $tenantRoutePrefix, $tenantSlugAttribute): void {
                                if ($routes = $panel->getAuthenticatedRoutes()) {
                                    $routes($panel);
                                }

                                Route::name('auth.')
                                    ->group(function () use ($panel): void {
                                        Route::post('/logout', LogoutController::class)->name('logout');

                                        if ($panel->hasProfile()) {
                                            $panel->getProfilePage()::registerRoutes($panel);
                                        }
                                    });

                                if ($panel->hasEmailVerification()) {
                                    Route::name('auth.email-verification.')
                                        ->prefix($panel->getEmailVerificationRoutePrefix())
                                        ->group(function () use ($panel) {
                                            Route::get($panel->getEmailVerificationPromptRouteSlug(), $panel->getEmailVerificationPromptRouteAction())
                                                ->name('prompt');
                                            Route::get($panel->getEmailVerificationRouteSlug('/{id}/{hash}'), EmailVerificationController::class)
                                                ->middleware(['signed', 'throttle:6,1'])
                                                ->name('verify');
                                        });
                                }

                                Route::name('tenant.')
                                    ->group(function () use ($panel): void {
                                        if ($panel->hasTenantRegistration()) {
                                            $panel->getTenantRegistrationPage()::registerRoutes($panel);
                                        }
                                    });

                                $routeGroup = Route::middleware($hasTenancy ? $panel->getTenantMiddleware() : []);

                                if (filled($tenantDomain)) {
                                    $routeGroup->domain($tenantDomain);
                                } else {
                                    $routeGroup->prefix(
                                        ($hasTenancy && blank($tenantDomain)) ?
                                            (
                                                filled($tenantRoutePrefix) ?
                                                    "{$tenantRoutePrefix}/" :
                                                    ''
                                            ) . ('{tenant' . (
                                                filled($tenantSlugAttribute) ?
                                                    ":{$tenantSlugAttribute}" :
                                                    ''
                                            ) . '}') :
                                            '',
                                    );
                                }

                                $routeGroup
                                    ->group(function () use ($panel): void {
                                        if ($routes = $panel->getAuthenticatedTenantRoutes()) {
                                            $routes($panel);
                                        }

                                        Route::get('/', RedirectToHomeController::class)->name('home');

                                        Route::name('tenant.')->group(function () use ($panel): void {
                                            if ($panel->hasTenantBilling()) {
                                                Route::get($panel->getTenantBillingRouteSlug(), $panel->getTenantBillingProvider()->getRouteAction())
                                                    ->name('billing');
                                            }

                                            if ($panel->hasTenantProfile()) {
                                                $panel->getTenantProfilePage()::registerRoutes($panel);
                                            }
                                        });

                                        foreach ($panel->getPages() as $page) {
                                            $page::registerRoutes($panel);
                                        }

                                        foreach ($panel->getResources() as $resource) {
                                            $resource::registerRoutes($panel);
                                        }
                                    });

                                if ($hasTenancy) {
                                    Route::get('/', RedirectToTenantController::class)->name('tenant');
                                }
                            });

                        if ($hasTenancy) {
                            $routeGroup = Route::middleware($panel->getTenantMiddleware());

                            if (filled($tenantDomain)) {
                                $routeGroup->domain($tenantDomain);
                            } else {
                                $routeGroup->prefix(
                                    (
                                        filled($tenantRoutePrefix) ?
                                            "{$tenantRoutePrefix}/" :
                                            ''
                                    ) . '{tenant' . (
                                        filled($tenantSlugAttribute) ?
                                            ":{$tenantSlugAttribute}" :
                                            ''
                                    ) . '}',
                                );
                            }

                            $routeGroup
                                ->group(function () use ($panel): void {
                                    if ($routes = $panel->getTenantRoutes()) {
                                        $routes($panel);
                                    }
                                });
                        }
                    });
            }
        }
    });

