<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Http;

class AuthWhastappWithoutLogin2 {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->details)
        {
            if (auth()->user()->isAdmin())
                return redirect()->route('whatsapp.link');
            return redirect()->route('whatsapp.login');
        }
//        try
//        {
//            $response = Http::withHeaders(
//                [
//                    'X-Session-Token' => env('GO_TOKEN'),
//                    'user_id'         => auth()->id(),
//                    'go_auth'         => auth()->user()->getGoAuth(),
//                ]
//            )->timeout(5)->post('http://' . env('GO_URL') . "/api/check-user", [
//                'user_id' => auth()->id(),
//            ]);
//
//            if ($response->object()->status && $response->object()->status == "success")
//            {
//                return $next($request);
//            } else
//            {
//
//                if ($request->ajax())
//                    return response(['status' => 'fail']);
//                return redirect()->route('link.whatsapp');
//            }
//
//        } catch (\Exception $e)
//        {
//            if ($request->ajax())
//                return response(['status' => 'fail', 'msg' => "الرجاء التأكد من اتصال الواتس اب  على الجوال"]);
//            return redirect()->route('link.whatsapp')->with('error', 'الرجاء التأكد من اتصال الواتس اب  على الجوال');
//
//        }
        return  $next($request);
    }
}