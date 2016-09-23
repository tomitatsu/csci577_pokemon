@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.common')
        @include('errors.success')

		<h2> {{$poke->name}} </h2>
		 
    </div>

    <!-- Current Pokemons -->
    @if (count($poke->trainers) > 0)
        <div class="panel panel-default">
	        <div class="panel-heading">
    	        Current Trainers
        	</div>

            <div class="panel-body">
	            <table class="table table-striped pokemon-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Trainer</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($poke->trainers as $trainer)
                            <tr>
                                <!-- Pokemon Name -->
                                <td class="table-text">
                                    <div>{{ $trainer->name }}</div>
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
