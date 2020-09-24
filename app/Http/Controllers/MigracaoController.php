<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MigracaoController extends Controller
{
    public function migracao(){
        // EU sei que existe uma tabela chamada: acervonormalizado que queremos juntar com itens!
        $normalizados = DB::table('acervonormalizado')->get();

        foreach ($normalizados as $normalizado) {
            $item = Item::where('tombo',$normalizado->tombo)->first();
            if(!$item) {//se não exister item, criar aqui
                $item = new Item;
                $item->tombo = $normalizado->tombo;
            }//atualização e inserção - se o campo da tabela acervo estiver vazio, manter informação do campo da tabela item
            $item->created_at = empty($item->created_at) ? $normalizado->created_at : $item->created_at;
            $item->titulo = empty($item->titulo) ? $normalizado->titulo : $item->titulo;
            $item->status = empty($item->status) ? $normalizado->status : $item->status;
            $item->tipo_aquisicao = empty($item->tipo_aquisicao) ? $normalizado->tipo_aquisicao : $item->tipo_aquisicao;
            $item->tipo_material = empty($item->tipo_material) ? $normalizado->tipo_material : $item->tipo_material;
            $item->sugerido_por = empty($item->sugerido_por) ? $normalizado->sugerido_por : $item->sugerido_por;
            $item->autor = empty($item->autor) ? $normalizado->autor : $item->autor;
            $item->editora = empty($item->editora) ? $normalizado->editora : $item->editora;
            $item->ano = empty($item->ano) ? $normalizado->ano : $item->ano;
            $item->tombo_antigo = empty($item->tombo_antigo) ? $normalizado->tombo_antigo : $item->tombo_antigo;
            $item->subcategoria = empty($item->subcategoria) ? $normalizado->subcategoria : $item->subcategoria;
            $item->edicao = empty($item->edicao) ? $normalizado->edicao : $item->edicao;
            $item->volume = empty($item->volume) ? $normalizado->volume : $item->volume;
            $item->parte = empty($item->parte) ? $normalizado->parte : $item->parte;
            $item->fasciculo = empty($item->fasciculo) ? $normalizado->fasciculo : $item->fasciculo;
            $item->local = empty($item->local) ? $normalizado->local : $item->local;
            $item->colecao = empty($item->colecao) ? $normalizado->colecao : $item->colecao;
            $item->isbn = empty($item->isbn) ? $normalizado->isbn : $item->isbn;
            $item->dpto = empty($item->dpto) ? $normalizado->departamento : $item->dpto;
            $item->finalidade = empty($item->finalidade) ? $normalizado->finalidade : $item->finalidade;
            $item->data_sugestao = empty($item->data_sugestao) ? $normalizado->data_sugestao : $item->data_sugestao;
            $item->prioridade = empty($item->prioridade) ? $normalizado->prioridade : $item->prioridade;
            $item->moeda = empty($item->moeda) ? $normalizado->moeda : $item->moeda;
            $item->preco = empty($item->preco) ? $normalizado->preco : $item->preco;
            $item->procedencia = empty($item->procedencia) ? $normalizado->procedencia : $item->procedencia;
            $item->observacao = empty($item->observacao) ? $normalizado->observacao : $item->observacao;
            $item->verba = empty($item->verba) ? $normalizado->verba : $item->verba;
            $item->processo = empty($item->processo) ? $normalizado->processo : $item->processo;
            $item->fornecedor = empty($item->fornecedor) ? $normalizado->fornecedor : $item->fornecedor;
            $item->nota_fiscal = empty($item->nota_fiscal) ? $normalizado->nota_fiscal : $item->nota_fiscal;
            $item->save();
        }
    }
}
