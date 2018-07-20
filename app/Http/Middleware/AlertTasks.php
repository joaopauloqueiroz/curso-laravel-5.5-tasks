<?php

namespace App\Http\Middleware;

use Closure;

class AlertTasks
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /**o middleware after e execuado depois que todas as camadas da aplicação foi executada */
        $response = $next($request);
        $ids = $request->session()->get('todotasks', []);
        if($ids)
        {
            $link = vsprintf('<a href="%s">%s</a>', [
                route('tasks.todo_index'),
                '(Clique aqui para ver a lista)'
            ]);
            $tasks = count($ids);
            $request->session()->flash('alert',"Você tem $tasks tarefas para fazer. {$link}");
        }else
        {
            $request->session()->flash('alert','Você não tem tarefas pendentes');
        }

        return $response;
    }
}
