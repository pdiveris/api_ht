<?php namespace Jisc;

use Closure;

class Test {

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    return $next($request);
  }

  public function hello() {
    return 'hello';
  }

}
