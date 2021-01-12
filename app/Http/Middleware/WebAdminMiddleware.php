<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UsersAccess;
/*
  use App\Models\Admin\UserAccessModel;
  use App\Http\Services\Service;
 */

class WebAdminMiddleware {

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws BusinessException
     */
    public function handle($request, Closure $next) {
        //$time = time();
        $uid = intval($request->uid);
        $reqToken = $request->token;
        $sessionUid = session("uid");
        $sessionToken = session("token");
        $flagUid = true;
        $flagToken = true;
        if($uid!=$sessionUid){
            $flagUid= false;
        }
        if($reqToken!=$sessionToken){
            $flagToken = false;
        }
        
        if((!$flagUid&&!$flagToken)||($flagUid&&!$flagToken)||(!$flagUid&&$flagToken)){
            //return redirect("errorPage");
            return redirect("login");
        }
        
        //var_dump($request->getRequestUri());
            
        
        return $next($request);
    }

}
