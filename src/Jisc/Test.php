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

 /**
  * Sanity check function for build system, sillbe deleted
  * @return string $hello
  */
  public function hello() {
    return 'hello';
  }

}
