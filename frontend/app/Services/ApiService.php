<?php
 
namespace App\Services;
 
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
 
class ApiService
{
    private $client;
    public const API_URL = 'http://localhost:8200/api/';
 
    public function __construct()
    {
        $this->getConnection();
    }
 
    private function getConnection()
    {
        try {
            $this->client = new Client(['base_uri' => self::API_URL]);
        } catch (\Exception $e) {
            return $e->getCode();
        }
    }
 
    public function get(string $endPoint)
    {
        try {
            $requisicao = $this->client->request('GET', $endPoint);
            $status = $requisicao->getStatusCode();
 
            return [
                'dados' => json_decode($requisicao->getBody()->getContents(), true),
                'status' => $status
            ];
 
        } catch (ConnectException $e) {
            return [
                'erro' => 'Erro de Conexao com a API: ' . self::API_URL,
                'status' => $e->getCode()
            ];
        } catch (\Exception $e) {
            return [
                'erro' => $e->getResponse()->getBody()->getContents(),
                'status' => $e->getCode()
            ];
        }
    }
 
    public function post(string $endPoint, array $dados)
    {
        try {
            $requisicao = $this->client->request('POST', $endPoint, $dados);
            $status = $requisicao->getStatusCode();
 
            return [
                'dados' => $requisicao->getBody()->getContents(),
                'status' => $status
            ];
 
        } catch (ConnectException $e) {
            return [
                'erro' => 'Erro de Conexao com a API: ' . self::API_URL,
                'status' => $e->getCode()
            ];
        } catch (\Exception $e) {
 
            $errorBag = new MessageBag();
            $errorBag->merge(
                (array)json_decode($e->getResponse()->getBody()->getContents())
            );
 
            $erro = new ViewErrorBag();
            $erro->put('default', $errorBag);
 
            return [
                'erro' => $teste,
                'status' => $e->getCode()
            ];
        }
    }
 
    public function put(string $endPoint, array $dados)
    {
        try {
            $requisicao = $this->client->request('PUT', $endPoint, $dados);
            $status = $requisicao->getStatusCode();
 
            return [
                'dados' => json_decode($requisicao->getBody()->getContents(), true),
                'status' => $status
            ];
        } catch (ConnectException $e) {
            return [
                'erro' => 'Erro de Conexao com a API: ' . self::API_URL,
                'status' => $e->getCode()
            ];
        } catch (\Exception $e) {
            return [
                'erro' => $e->getResponse()->getBody()->getContents(),
                'status' => $e->getCode()
            ];
        }
    }
 
    public function delete(string $endPoint)
    {
        try {
            $requisicao = $this->client->request('DELETE', $endPoint);
            $status = $requisicao->getStatusCode();
 
            return [
                'dados' => json_decode($requisicao->getBody()->getContents(), true),
                'status' => $status
            ];
        } catch (ConnectException $e) {
            return [
                'erro' => 'Erro de Conexao com a API: ' . self::API_URL,
                'status' => $e->getCode()
            ];
        } catch (\Exception $e) {
            return [
                'erro' => $e->getResponse()->getBody()->getContents(),
                'status' => $e->getCode()
            ];
        }
    }
 
}