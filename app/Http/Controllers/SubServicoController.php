<?php

namespace App\Http\Controllers;

use App\Models\SubServico;
use App\Models\Servico;
use App\Http\Requests\StoreSubServicoRequest;
use App\Http\Requests\UpdateSubServicoRequest;
use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;

class SubServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SubServico::with('servico')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'name' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'tempo_de_duracao' => 'required|min:0',
            'servico_id' => 'required|integer|exists:servicos,id',
            // 'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'name.string' => 'O campo nome deve ser uma string',
            'name.max' => 'O campo nome não deve exceder 255 caracteres',
            'preco.numeric' => 'O campo preço deve ser numérico',
            'preco.min' => 'O preço não deve ser menor que 0',
            'tempo_de_duracao.min' => 'O tempo de duração não deve ser menor que 0',
            'servico_id.integer' => 'O campo servico id deve ser um número inteiro',
            'servico_id.exists' => 'A servico com este ID não existe',
            // 'imagem.required' => 'A imagem é obrigatória.',
            // 'imagem.image' => 'O arquivo deve ser uma imagem.',
            // 'imagem.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
            // 'imagem.max' => 'A imagem não deve ter mais de 2MB.',
        ];

        $request->validate($regras, $feedback);

        $inputData = $request->all();

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('images', 'public');  // Armazena na pasta 'storage/app/public/images'
            $baseURL = env('APP_URL'); // Obtém a URL base do .env
            $inputData['imagem'] = $baseURL . '/storage/' . $path;  // Concatena a URL base ao caminho da imagem
        }

        $data = SubServico::create($inputData);

        return response()->json([
            "success" => true,
            "data" => $data,
            "msg" => "sucesso"
        ], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(SubServico $subServico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubServico $subServico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubServico $subservico)
    {
        $regras = [
            'name' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'tempo_de_duracao' => 'required|min:0',
            'servico_id' => 'required|integer|exists:servicos,id',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'name.string' => 'O campo nome deve ser uma string',
            'name.max' => 'O campo nome não deve exceder 255 caracteres',
            'preco.numeric' => 'O campo preço deve ser numérico',
            'preco.min' => 'O preço não deve ser menor que 0',
            // 'tempo_de_duracao.numeric' => 'O campo tempo de duração deve ser numérico',
            'tempo_de_duracao.min' => 'O tempo de duração não deve ser menor que 0',
            'servico_id.integer' => 'O campo servico id deve ser um número inteiro',
            'servico_id.exists' => 'A servico com este ID não existe',
        ];
        $request->validate($regras, $feedback);

        $subservico->update($request->all());
        return response()->json([
            "success" => true,
            "data" => $subservico,
            "msg" => "sucesso"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubServico $subservico)
    {
        try {
            // Tentativa de deletar o servico
            $subservico->delete();

            return response()->json(['message' => 'subServico deleted successfully'], Response::HTTP_OK);

        } catch (QueryException $e) {
            // Caso haja algum erro na operação do banco de dados
            return response()->json(['message' => 'Failed to delete the servico'], Response::HTTP_INTERNAL_SERVER_ERROR);

        } catch (\Exception $e) {
            // Caso haja algum outro erro não esperado
            return response()->json(['message' => 'Server error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
