<?php

namespace App\Http\Controllers;
use Log;
use Gate;
use Auth;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Services\Treinaweb;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $client;
    protected $treina;
    public  function __construct(Client $client)
    {
        //aplicar so em um 
       //$this->middleware('alerttasks')->only('index');
        $this->client = $client;
               
       $this->middleware('alerttasks');
    }

    public function index(Request $request)
    {
        Log::info('O usuario '. Auth::user()->name . ' acessou a lista de clientes');
        /**
        * declarando sessão
        */

        // $request->session()->put('framework','Laravel');
        // session(['versao'=>'5.6']);
        //var_dump(session('todotasks'));
        $clients = $this->client->paginate();

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /**
         * Mostrando as sessões
         *
         * echo $request->session()->get('framework');
         * echo session('versao');
         *
         */
        
         return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        Log::info('O usuario '. Auth::user()->name . ' Criou um novo cliente');

        $data = $request->all();
        $data['user_id'] = Auth::User()->id;
        $data['photo'] = $request->photo->store('public');
        
        if(Client::create($data)){
            $request->session()->flash('success','Cliente cadastrado com sucesso!');
        }else{
            $request->session()->flash('error','Erro ao cadastrar cliente!');
        }
        
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //usando o route model bind
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //$client = $this->client->findOrFail($id);

        //verificar se o usuario tem permissão de editar
       //$this->authorize('update-client', $client);
       
       //assim podemos redirecionar pra uma view especifica
       if(Gate::denies('update-client', $client)){
            return view('clients.error');
        }

        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {

        $this->validate($request, $this->client->rulesUpdate);
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->photo->store('public');
        }
        
        //verificar se o usuario tem  permissão para atualizar o registro
        $this->authorize('update-client', $client);
               
        if($client->update($data)){
            $request->session()->flash('success','Cliente atualizado com sucesso!');
        }else{
            $request->session()->flash('error','Erro ao atualizar cliente!');
        }
        
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Client $client)
    {
       
         //verificar se o usuario tem  permissão para deletar o registro
       $this->authorize('update-client', $client);
      
        if($client->delete()){
            $request->session()->flash('success','Cliente deletado com sucesso!');
        }else{
            $request->session()->flash('error','Erro ao deletar o cliente!');
        }

        return redirect()->route('clients.index');   
    }
}
