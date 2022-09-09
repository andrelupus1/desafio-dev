<?php

namespace App\Http\Controllers;

use App\Repositories\TransacaoRepository;
use Illuminate\Http\Request;

class fileUploadController extends Controller
{
    private $TransacaoRepository;

    public function __construct(TransacaoRepository $TransacaoRepository)
    {
        $this->TransacaoRepository = $TransacaoRepository;
    }

    public function parsecnab(Request $request)
    {
        try {

            $file = $this->openFIle($request->file('file'));
            $transacao = array();
                while (!feof($file)) {
                    $line = fgets($file);
                    array_push($transacao,$line);      
                }
                fclose($file);

            $transacao = $this->filter($transacao);
            $this->store($transacao);

            return redirect('/exibir-operacoes');

        } catch (\Throwable $th) {
            return "Erro inesperado! ";
        }
        
    }
        

    public function openFIle($file)
    {
        $file->move(public_path('files'),$file->getClientOriginalName());
        return fopen("files/".$file->getClientOriginalName(), 'r');
    }

    public function filter($cnab)
    {
        $array = array_map(function($cnab){
            return str_ireplace("\n","",$cnab);
        },$cnab);

        return $array;
    }

    public function store($values)
    {
        $transacao = array();
        array_pop($values);
        foreach ($values as $key => $element) {
            $transacao['tipo']= substr($element, 0, 1);
            $transacao['data']= substr($element, 1, 8);
            $transacao['valor']= substr($element, 9, 10);
            $transacao['cpf']=substr($element, 19, 11);
            $transacao['cartao']= substr($element, 30, 12);
            $transacao['hora']= substr($element, 42, 6);
            $transacao['dono']= trim(substr($element, 48, 14));
            $transacao['loja']= trim(substr($element, 62, 19));

            $this->TransacaoRepository->store($transacao);
        }
        
    }

    public function getOperacoes()
    {
        $this->TransacaoRepository->getTransacoes('Bar');
    }


    

}
