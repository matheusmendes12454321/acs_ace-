<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/', fn() => view('login'));
Route::get('/login', fn() => view('login'));
Route::get('/app', fn() => view('app'));

Route::post('/api/login', function (Request $r) { $user = DB::table('users')->where('email', $r->email)->where('senha', $r->senha)->first(); return response()->json(['success' => !!$user, 'user' => $user]); });
Route::get('/api/stats', function () { return response()->json([ 'agentes' => DB::table('users')->whereIn('funcao',['acs','ace'])->count(), 'microareas' => DB::table('microareas')->count(), 'familias' => DB::table('families')->count(), 'visitas' => DB::table('visits')->count(), 'focos' => DB::table('endemics_focus')->count() ]); });
Route::get('/api/agentes', fn() => DB::table('users')->whereIn('funcao',['acs','ace'])->get());
Route::post('/api/agentes', function (Request $r) { return DB::table('users')->insert(['nome'=>$r->nome,'email'=>$r->email,'senha'=>$r->senha,'funcao'=>$r->funcao]); });
Route::delete('/api/agentes/{id}', fn($id) => DB::table('users')->where('id',$id)->delete());
Route::get('/api/microareas', fn() => DB::table('microareas')->get());
Route::post('/api/microareas', function (Request $r) { return DB::table('microareas')->insert(['nome'=>$r->nome,'codigo'=>$r->codigo,'descricao'=>$r->descricao]); });
Route::delete('/api/microareas/{id}', fn($id) => DB::table('microareas')->where('id',$id)->delete());
Route::get('/api/familias', fn() => DB::table('families')->get());
Route::post('/api/familias', function (Request $r) { return DB::table('families')->insert(['endereco'=>$r->endereco,'numero'=>$r->numero,'bairro'=>$r->bairro,'responsavel_nome'=>$r->responsavel_nome,'responsavel_telefone'=>$r->responsavel_telefone,'microarea_id'=>$r->microarea_id,'latitude'=>$r->latitude,'longitude'=>$r->longitude]); });
Route::delete('/api/familias/{id}', fn($id) => DB::table('families')->where('id',$id)->delete());
Route::get('/api/visitas', fn() => DB::table('visits')->get());
Route::post('/api/visitas', function (Request $r) { return DB::table('visits')->insert(['family_id'=>$r->family_id,'agente_id'=>1,'data_visita'=>$r->data_visita,'hora'=>$r->hora,'resultado'=>$r->resultado,'observacoes'=>$r->observacoes]); });
Route::get('/api/agenda', fn() => DB::table('schedule_visits')->orderBy('data_agendada')->get());
Route::get('/api/agenda/hoje', fn() => DB::table('schedule_visits')->where('data_agendada',date('Y-m-d'))->get());
Route::post('/api/agenda', function (Request $r) { return DB::table('schedule_visits')->insert(['family_id'=>$r->family_id,'agente_id'=>1,'data_agendada'=>$r->data_agendada,'hora_agendada'=>$r->hora_agendada,'observacoes'=>$r->observacoes]); });
Route::get('/api/focos', fn() => DB::table('endemics_focus')->get());
Route::post('/api/focos', function (Request $r) { return DB::table('endemics_focus')->insert(['tipo'=>$r->tipo,'local'=>$r->local,'descricao'=>$r->descricao,'agente_id'=>1,'latitude'=>$r->latitude,'longitude'=>$r->longitude,'status'=>$r->status]); });
Route::get('/api/alertas', fn() => DB::table('alerts')->orderBy('created_at','desc')->get());
Route::get('/api/notificacoes', fn() => DB::table('notifications')->orderBy('created_at','desc')->get());
Route::get('/api/notificacoes/naoLidas', fn() => DB::table('notifications')->where('lida',0)->get());
