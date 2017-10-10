<?php
namespace FlorDeLiz\Http\Middleware;
use Closure;
use FlorDeLiz\Repositories\UserRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
class OAuthCheckRole
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $id = Authorizer::getResourceOwnerId();
        $user = $this->userRepository->find($id);
//        return dd($user->hasRole($role));
        if($user->hasRole($role) || !$role){
            return $next($request);
        }
        abort(401, "Acesso não Autorizado. Você não tem permissão suficiente para acessar essa rota!");
    }
}