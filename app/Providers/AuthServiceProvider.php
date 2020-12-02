<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\papel;
use App\Models\permissao;
use App\Models\universidade;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('editar', function(User $user, universidade $universidade){
        //     return $user->id == $universidade->id_utilizador;
        // });

        // Recupera as permissões com os papeis
        $permissoes = permissao::with('papeis')->get();

        foreach($permissoes as $permissao)
        {
            Gate::define($permissao->nome_permissao, function(User $user) use ($permissao) {
                return $user->temPermissao($permissao);
            });
        }

        Gate::before(function(User $user, $ability){
            if( $user->temAlgumPapel('Admin')){
                return true;
            }
        });
    }
}
