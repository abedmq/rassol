<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Http;

class AuthWhastapp {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        try
        {
            $response = Http::withHeaders(
                [
                    'X-Session-Token' => env('GO_TOKEN'),
                    'user_id'         => auth()->id(),
                    'go_auth'         => auth()->user()->getGoAuth(),
                ]
            )->post('http://' . env('GO_URL') . "/api/check-user", [
                'user_id' => auth()->id(),
            ]);

            if ($response->object()->status && $response->object()->status == "success")
            {
                return $next($request);
            } else
            {

                if ($request->ajax())
                    return response(['status' => 'fail', 'need_login' => true]);
                return redirect()->route('link.whatsapp');
            }

        } catch (\Exception $e)
        {
            dd($e->getMessage());
            if ($request->ajax())
                return response(['status' => 'fail', 'msg' => "الرجاء التأكد من اتصال الواتس اب  على الجوال"]);
            return redirect()->route('link.whatsapp')->with('error', 'الرجاء التأكد من اتصال الواتس اب  على الجوال');

        }
    }
}