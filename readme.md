Tats Pokemon System
===================

## Sign up
You can sign-up by clicking "Register" button on top of the welcome page. You have to input:

 - Name (used as your account) 
 - email (used when you forgot your password) 
 - Password

Hometown can be empty.

[Note]: If you want to be admin, you have to access database directly and change the value of "isAdmin" column from 0 to 1.

## What trainers can/cannot do
**Bold** means special feature (not included in the assignment document).

 - Edit "your" profile. 
	 - Click "edit" link in your profile in the user's table in home page
	 - Or, click "Edit Profile" button under your name on top right in homepage
 - Cannot edit other's profile.
 - Change your profile.
	 - Including selecting a pokemon in edit page.
	 - **You can choose empty name of pokemon, it means you don't have a pokemon** 
	 - **After edit your profile, you can see this message in homepage.** 
		 - "Congrats! Edit success"
 - If you attempt to see restricted page (i.e. only admin can see the page), you go to "forbidden" page
	 - In this case, you should use "back" button of your browser.

## What admins can/cannot do
 - All things trainers can do
 - Chage profiles of all members
	 - Click "edit" link in the profile in the user's table in home page
 - Manage pokemons
	 - Click "Admin" button under your name on top right in your home page
	 - Add a pokemon to the system
		 - **If you succeed to add a pokemon, you can see this message:**
			 - Congrats! A new pokemon has been created! 
		 - **If you fail to add a pokemon, you can see this kind of message:**
			 - The name has already been taken.
	 - Delete a pokemon
		 - **If you succeed to delete a pokemon, you can see this message:**
			 - Congrats! "pokemon's name" has been deleted! 
	 - You can see the total number of pokemons the system has, all pokemons' name, and the number of trainers of each pokemon
	 - **You can also see the name of trainers who own the each pokemon**
		 - Click the link of the pokemon's name
	 - You can go back to your home page by clicking "Go Back to Home" button on the bottom of admin page


## Files
I mainly edited these files:

 - App/Http/Controllers/
	 - HomeController.php
	 - PokemonsController.php
		 - **Uses AdminEditRequest to prevent trainers (i.e. not admin) from going admin page.**
	 - Auth/
		 - LoginController.php
			 - **Override authenticate() function to use "name" field of User table instead of "email"**
		 - RegisterController.php
		 - UsersController.php
			 - This controller manages editing user profile in getUpdate() and postUpdate()
			 - **Uses AdminEditRequest to prevent trainers (i.e. not admin) from going edit user page.**
 - App/Http/Requests/
	 - AdminEditRequest.php
		 - **Check the user is authorized in terms not only of logged-in but also of admin or not.**
 - App/
	 - Pokemon.php
 - resources/views
	 - home.blade.php
	 - welcome.blade.php
	 - errors/
		 - common.blade.php
		 - success.blade.php
			 - **these files are used to show error/success message**
	 - auth/
		 - update.blade.php
			 - for editing the user profile
	 - pokemons/
		 - index.blade.php
		 - detail.blade.php
 - routes/
	 - web.php
