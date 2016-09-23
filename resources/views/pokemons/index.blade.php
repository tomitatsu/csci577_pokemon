@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.common')
        @include('errors.success')

		<h2> Total Number of Pokemon is {{count($pokes)}} </h2>
		 
        <!-- New Pokemon Form -->
        <form action="{{ url('pokemon/create') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Pokemon Name -->
            <div class="form-group">
                <label for="pokemon" class="col-sm-3 control-label">Pokemon</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="pokemon-name" class="form-control">
                </div>
            </div>

            <!-- Add pokemon Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Pokemon
                    </button>
                </div>
            </div>
        </form>        
    </div>

    <!-- Current Pokemons -->
    @if (count($pokes) > 0)
        <div class="panel panel-default">
	        <div class="panel-heading">
    	        Current Pokemons
        	</div>

            <div class="panel-body">
	            <table class="table table-striped pokemon-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Pokemon</th>
                        <th># of trainers</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($pokes as $poke)
                            <tr>
                                <!-- Pokemon Name -->
                                <td class="table-text">
                                    <div>{{ link_to_action('PokemonsController@detail', $poke->name, array($poke->name)) }}</div>
                                </td>

                                <!-- Number of trainers -->
                                <td class="table-text">
                                    <div>{{ $poke->trainers->count() }}</div>
                                </td>

                                <!-- Delete Button -->
                                <td>
							        <form action="{{ url('pokemon/'.$poke->name) }}" method="POST">
							            {{ csrf_field() }}
							            {{ method_field('DELETE') }}

							            <button type="submit" class="btn btn-danger">
							                <i class="fa fa-trash"></i> Delete
							            </button>
							        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    	</div>
	@endif

	{{ link_to_action('HomeController@index','Go Back To Home')}}

@endsection
