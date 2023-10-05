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
        return SubServico::all();
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
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'tempo_de_duracao' => 'required|numeric|min:0',
            'servico_id' => 'required|integer|exists:servicos,id',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.string' => 'O campo nome deve ser uma string',
            'nome.max' => 'O campo nome não deve exceder 255 caracteres',
            'preco.numeric' => 'O campo preço deve ser numérico',
            'preco.min' => 'O preço não deve ser menor que 0',
            'tempo_de_duracao.numeric' => 'O campo tempo de duração deve ser numérico',
            'tempo_de_duracao.min' => 'O tempo de duração não deve ser menor que 0',
            'servico_id.integer' => 'O campo servico id deve ser um número inteiro',
            'servico_id.exists' => 'A servico com este ID não existe',
        ];

        $request->validate($regras, $feedback);

        $data = SubServico::create($request->all());
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
    public function update(Request $request, SubServico $subServico)
    {
        $regras = [
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'tempo_de_duracao' => 'required|numeric|min:0',
            'servico_id' => 'required|integer|exists:servicos,id',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.string' => 'O campo nome deve ser uma string',
            'nome.max' => 'O campo nome não deve exceder 255 caracteres',
            'preco.numeric' => 'O campo preço deve ser numérico',
            'preco.min' => 'O preço não deve ser menor que 0',
            'tempo_de_duracao.numeric' => 'O campo tempo de duração deve ser numérico',
            'tempo_de_duracao.min' => 'O tempo de duração não deve ser menor que 0',
            'servico_id.integer' => 'O campo servico id deve ser um número inteiro',
            'servico_id.exists' => 'A servico com este ID não existe',
        ];
        $request->validate($regras, $feedback);

        $subServico->update($request->all());
        return response()->json([
            "success" => true,
            "data" => $subServico,
            "msg" => "sucesso"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubServico $subServico)
    {
        try {
            // Tentativa de deletar o servico
            $subServico->delete();

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
