<div class="form-group">
  <label for="name" class="col-sm-2 control-label">Nome</label>
  <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{@$project->name}}">
  </div>
</div>
<div class="form-group">
  <label for="cost" class="col-sm-2 control-label">Cost</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="cost" name="cost" placeholder="Cost" value="{{@$project->cost}}">
  </div>
</div>

<div class="form-group">
  <label for="client_id" class="col-sm-2 control-label">Cliente</label>
  <div class="col-sm-10">
    <select type="text" class="form-control" id="client_id" name="client_id">
      <option value="">Selecione um cliente</option>
      @foreach ($clients as $client)
      <option value="{{$client->id}}" {{@$project->client_id == $client->id ? 'selected': ''}}>{{$client->name}}</option>
      @endforeach
    </select>
  </div>
</div>

<div class="form-group">
  <label for="Description" class="col-sm-2 control-label">Descrição</label>
  <div class="col-sm-10">
      <textarea name="description" id="Description" placeholder="Descrição" cols="30" rows="5" class="form-control">{{@$project->description}}</textarea>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
  <button type="submit" class="btn btn-default">Salvar</button>
  </div>
</div>
