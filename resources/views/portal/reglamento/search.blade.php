{!! Form::open(array('url'=>'portal/reglamento','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
<div class="form-group">
    <input type="text" class="form-control" name="searchText" placeholder="Buscar" value="{{$searchText}}">
    <span class="input-group-btn">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </span>
</div>
{{Form::close()}}