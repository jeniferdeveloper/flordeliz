<?php

namespace FlorDeLiz\Http\Middleware;

use function abort;
use Closure;
use function dd;
use \Illuminate\Support\Facades\Auth;
use function nullOrEmptyString;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  Closure  $next
     * @return mixed
     * Agora é só usarmos ele nas rotas:

    'middleware' => 'auth.checkrole:client'
    'middleware' => 'auth.checkrole:minha-outra-role'
    Assim, o middleware se tornou um componente reutilizável com a passagem do parâmetro
     */
//    public function handle($request, Closure $next, $role) //aqui adicionamos um parametro para o middleware
//    {
//
//        if(!Auth::check()) {
//            return redirect('/auth/login');
//        }
//
//        if(Auth::user()->role <> $role) { //se a role do usuário autenticado bate com a $role que passamos
//            return redirect('/auth/login');
//        }
//
//        return $next($request);
//    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
             if (!Auth::check()) {
                return redirect('auth/login');
            }

            if($request->user() ===null){
        abort(401, 'Acesso não Autorizado');
    }

            $actions = $request->route()->getAction();
            $roles = isset($actions['permission']) ? $actions['permission'] : null;

            if($request->user()->hasManyRoles($roles) || !$roles){
                return $next($request);
            }

        abort(401, 'Acesso não Autorizado');
    }
}
