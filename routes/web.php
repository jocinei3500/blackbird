<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('app.home');

//Marca
Route::middleware('auth')->resource('/marca', 'App\Http\Controllers\MarcaController');


//fornecedor
Route::middleware('auth')->resource('/fornecedor', 'App\Http\Controllers\FornecedorController');

//produto
Route::middleware('auth')->resource('/produto', 'App\Http\Controllers\ProdutoController');

//equipamento
Route::middleware('auth')->resource('/equipamento', 'App\Http\Controllers\EquipamentoController');

//entrada de produtos
Route::middleware('auth')->resource('/entrada-produto', 'App\Http\Controllers\EntradaProdutoController');

//saida de produtos
Route::middleware('auth')->resource('/saida-produto', 'App\Http\Controllers\SaidaProdutoController');

//ordem-producao
Route::middleware('auth')->resource('/ordem-producao', 'App\Http\Controllers\OrdemProducaoController');

//produto-fornecedor -create
Route::middleware('auth')->get('produto_fornecedor/create','App\Http\Controllers\ProdutoFornecedorController@create'
)->name('produto-fornecedor.create');


//mostra produto-fornecedor
Route::middleware('auth')->post('produto_fornecedor/show','App\Http\Controllers\ProdutoFornecedorController@show'
)->name('produto-fornecedor.show');

//produto-fornecedor-destroy
Route::middleware('auth')->delete('produto_fornecedor/{produtoFornecedor}/{fornecedor}','App\Http\Controllers\ProdutoFornecedorController@destroy'
)->name('produto-fornecedor.destroy');
//produto-fornecedor.store
Route::middleware('auth')->post('produto_fornecedor/store/{fornecedor}','App\Http\Controllers\ProdutoFornecedorController@store'
)->name('produto-fornecedor.store');



Route::middleware('auth')->post('parada-equipamento/store/{ordem_producao}','App\Http\Controllers\ParadaEquipamentoController@store'
)->name('parada-equipamento.store');

//busca o horimetro inicial de Ordem de produção via ajax
Route::middleware('auth')->get('utils/get-horimetro-inicial','App\Http\Controllers\UtilsController@getHorimetroInicial'
)->name('utils.get-horimetro-inicial');

//busca o horimetro inicial de recursos de produção via ajax.
Route::middleware('auth')->get('utils/get-horimetro-inicial-recursos','App\Http\Controllers\UtilsController@getHorimetroInicialRecursos'
)->name('utils.get-horimetro-inicial-recursos');

//grupo recursos_producao
Route::middleware('auth')->prefix('/recursos-producao')->group(function() {
    Route::get('index','App\Http\Controllers\RecursosProducaoController@index'
    )->name('recursos-producao.index');  

    Route::get('create','App\Http\Controllers\RecursosProducaoController@create'
    )->name('recursos-producao.create');

    Route::post('store/{ordem_producao}','App\Http\Controllers\RecursosProducaoController@store'
    )->name('recursos-producao.store');

    Route::post('store_avulso','App\Http\Controllers\RecursosProducaoController@store_avulso'
    )->name('recursos-producao.store_avulso');

    Route::get('show/{operacao}','App\Http\Controllers\RecursosProducaoController@show'
    )->name('recursos-producao.show');

    Route::get('edit/{operacao}','App\Http\Controllers\RecursosProducaoController@edit'
    )->name('recursos-producao.edit');

    Route::get('update/{operacao}','App\Http\Controllers\RecursosProducaoController@update'
    )->name('recursos-producao.update');
    
    Route::delete('destroy/{operacao}','App\Http\Controllers\RecursosProducaoController@destroy'
    )->name('recursos-producao.destroy');

});
