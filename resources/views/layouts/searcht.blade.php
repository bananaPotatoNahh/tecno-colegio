{!! Form::open(array('url'=>'buscador','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
<div class="small">
    <div class="form-group " name="searchText">
        <input type="text" class="form-control" name="searchText" placeholder="Buscar">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</div>
{!! Form::close() !!}