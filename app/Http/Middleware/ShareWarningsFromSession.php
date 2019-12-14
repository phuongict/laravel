<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Support\ViewErrorBag;

class ShareWarningsFromSession
{
    protected $view;

    /**
     * Create a new error binder instance.
     *
     * @param  \Illuminate\Contracts\View\Factory  $view
     * @return void
     */
    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        echo '<pre>'.__FILE__.'::'.__METHOD__.'('.__LINE__.')<br>';
//            print_r( $request->session()->get('success'));
//        echo '</pre>';
//        die();
        $this->view->share(
            'warnings', $request->session()->get('warnings') ?: new ViewErrorBag
        );
        return $next($request);
    }
}
