<?php
 
namespace App\Services;
 
use App\Models\ValidacaoPacote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;
 
class PacoteService
{
    private $api;
 
    public function __construct()
    {
        $this->api = new ApiService();
    }
 
    public function salvarPacote(Request $request)
    {
        $request->flash();
 
        Validator::make(
            $request->all(),
            ValidacaoPacote::REGRA_NOVO_PACOTE,
            ValidacaoPacote::MENSAGENS_DE_ERRO
        )->validate();
 
        $parametros = $request->all();
 
        if ($request->hasFile('urlImagem')) {
            $imageService = new ImageService();
            $urlImagem = $imageService->salvarImagem($request->urlImagem);
 
            $parametros = array_merge(
                $parametros,
                array('urlImagem' => $urlImagem)
            );
        }
 
        return $this->api->POST('pacote', [
            'form_params' => $parametros
        ]);
    }
 
    public function buscarPacotes()
    {
        return $this->api->GET('pacotes');
    }
 
    public function buscarPacote($id)
    {
        return $this->api->GET('pacote/' . $id . '/detalhes');
    }
 
    public function excluirPacote($id)
    {
        return $this->api->DELETE('pacote/' . $id);
    }
 
    public function editarPacote(Request $request)
    {
        $request->flash();
 
        Validator::make(
            $request->all(),
            ValidacaoPacote::REGRA_NOVO_PACOTE,
            ValidacaoPacote::MENSAGENS_DE_ERRO
        )->validate();
 
        $parametros = $request->except('_token');
 
        if ($request->hasFile('urlImagem')) {
            $imageService = new ImageService();
            $urlImagem = $imageService->salvarImagem($request->urlImagem);
 
            $parametros = array_merge(
                $parametros,
                array('urlImagem' => $urlImagem)
            );
        }
        return $this->api->PUT('pacote/' . $request->input('id'), [
            'form_params' => $parametros
        ]);
    }
 
}