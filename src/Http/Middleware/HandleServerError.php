<?php

namespace Kinsari\Azticketing\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class HandleServerError
{
    /**
     * Handle an incoming request and capture exceptions globally.
     */
    public function handle(Request $request, Closure $next)
    {
            $response = $next($request);

            if ($response->getStatusCode() === 500) {

                $mensagemDoErro = $response->exception->getMessage();
                $arquivoDoErro = $response->exception->getFile();
                $linhaDoErro = $response->exception->getLine();
                $traceDoErro = $response->exception->getTraceAsString();
                $urlDoErro = $request->fullUrl();

                $mensagemDoErroDetalhada = "Mensagem do Erro: $mensagemDoErro\n";
                $mensagemDoErroDetalhada .= "Arquivo: $arquivoDoErro\n";
                $mensagemDoErroDetalhada .= "Linha: $linhaDoErro\n";
                $mensagemDoErroDetalhada .= "URL: $urlDoErro\n";
                $mensagemDoErroDetalhada .= "Rastreamento de pilha:\n$traceDoErro";

                Session::flash('exceptionMessage',$mensagemDoErroDetalhada);

                return response()->view('azticketing::errors.500', [], 500);
            }

            return $response;
    }
}
