<?php
 
namespace App\Http\Controllers;
 
use App\Services\PacoteService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
 
class PacoteController extends Controller
{
    private $pacoteService;
 
    public function __construct()
    {
        $this->pacoteService = new PacoteService();
    }
 
    public function home()
    {
        $pacotes = $this->pacoteService->buscarPacotes();
        return view('home')->with('pacotes', $pacotes);
    }
 
    public function cadastro()
    {
        return view('cadastro');
    }
 
    public function confirmarExclusao(int $id)
    {
        $pacote = $this->pacoteService->buscarPacote($id);
        return view('exclusao')->with('pacote', $pacote);
    }
 
    public function descreverPacote(int $id)
    {
        $pacote = $this->pacoteService->buscarPacote($id);
        return view('edicao')->with('pacote', $pacote);
    }
 
    public function salvarPacote(Request $request)
    {
        $retorno = $this->pacoteService->salvarPacote($request);
        $statusHttp = $retorno['status'];
 
        switch ($statusHttp) {
            case Response::HTTP_CREATED:
                return redirect('/')->with(
                    'mensagem',
                    'Pacote cadastrado com sucesso'
                );
 
            case Response::HTTP_BAD_REQUEST:
                return view('cadastro')->with('errors', $retorno['erro']);
 
            default:
                $erro = 'Erro ao salvar o pacote. HTTP STATUS: ' . $retorno['status'];
                return redirect('/')->with('erro', $erro);
        }
    }
 
    public function editarPacote(Request $request)
    {
        $retorno = $this->pacoteService->editarPacote($request);
        $statusHttp = $retorno['status'];
 
        switch ($statusHttp) {
            case Response::HTTP_OK:
                return redirect('/')->with(
                    'mensagem',
                    'Pacote atualizado com sucesso'
                );
 
            case Response::HTTP_BAD_REQUEST:
                return view('edicao')->with('errors', $retorno['erro']);
 
            default:
                $erro = 'Nenhum dado foi alterado';
                return redirect('/')->with('erro', $erro);
        }
    }
 
    public function excluirPacote(Request $request)
    {
        $retorno = $this->pacoteService->excluirPacote($request->input('id'));
        $statusHttp = $retorno['status'];
 
        switch ($statusHttp) {
            case Response::HTTP_OK:
                return redirect('/')->with(
                    'mensagem',
                    'Pacote excluido com sucesso'
                );
            default:
                $erro = 'Erro ao excluir o pacote. HTTP STATUS: ' . $retorno['status'];
                return redirect('/')->with('erro', $erro);
        }
    }
 
}