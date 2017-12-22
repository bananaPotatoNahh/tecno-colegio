<form class="navbar-form navbar-left">
{!! Form::open(array('url'=>'buscador','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
    <div class="small">
        <div class="form-group " name="searchText"  value="{{$searchText}}">
    <input type="text" class="form-control" name="searchText" placeholder="Buscar" value="{{$searchText}}">

        <button type="submit" class="btn btn-primary">Buscar</button>

</div>
{{Form::close()}}</div>
</form>