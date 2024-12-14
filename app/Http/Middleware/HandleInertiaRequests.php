<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Foundation\Application;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            // Synchronously...
            'appName' => config('app.name'),

            // Lazily...
            'auth.user' => fn() => $request->user()
                ? $request->user()->only('id', 'name', 'avatar')
                : null,
            'flash' => [
                'message' => fn() => $request->session()->get('message'),
            ],
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,

        ]);
    }
}
