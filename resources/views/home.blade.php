@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

        <!-- Display Validation Errors -->
        @include('errors.common')
        @include('errors.success')

                <div class="panel-body">
                    You are logged in!
                    <h2>All members</h2>
                    <table border='1'>
                    <tr>
	                    <th>Name</th><th>Hometown</th><th>Pokemon</th><th>Action</th><th>Admin</th>
                    </tr>
                  	@foreach($users as $user)
                    	<tr>
    	                	<td>{{$user->name}} </td>
    	                	<td>{{$user->hometown or 'N/A'}} </td>
   		                	<td>{{$user->pokemon or 'N/A'}} </td>

    	                	@if ($user->name === $curUser->name)
    	                		<td>{{link_to_action('Auth\UsersController@getUpdate', 'edit', array($user->id))}} </td>
    	                	@elseif ($curUser->isAdmin == 1)
    	                		<td>{{link_to_action('Auth\UsersController@getUpdate', 'edit', array($user->id))}} </td>
    	                	@else
	    	                	<td></td>
    	                	@endif

    	                	@if ($user->isAdmin == 0)
    	                		<td>No</td>
    	                	@else
    	                		<td>Yes</td>
    	                	@endif
                    	</tr>
                   	@endforeach
				    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
