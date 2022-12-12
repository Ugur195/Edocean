<?php

namespace App\Http\Middleware;

use Closure;
use http\Exception\UnexpectedValueException;
use Illuminate\Http\Request;

class AdminsPermissions
{
    private $roleId;

    private $urls = [
        '1' => '/admin/index',
        '2' => '/admin/course/index',
        '3' => '/admin/teacher/index',
        '4' => '/admin/student/index'
    ];
    public function __construct()
    {
        $this->roleId = auth()->user()->author;
    }

    public function handle(Request $request, Closure $next, string $roleId)
    {
        if (auth()->guest()) {
            return redirect()->route('sign_up');
        }

        if ($this->roleId == $roleId) {
            redirect($this->urls[$this->roleId]);
        }else{
            return back();
        }

        return $next($request);
    }
}
