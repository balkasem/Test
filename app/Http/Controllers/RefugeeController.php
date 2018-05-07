<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Refugee;

class RefugeeController extends Controller
{
    //
    public function index()
    {
        return 'Here are all the Refugees...';
    }

    public function show($name = null)
    {
        return view('Refugee.show')->with(['name' => $name ]);
        //return 'Refugee name entered is ... ' . $name  ;
    }



    public function search(Request $request) {

        # ======== Temporary code to explore $request ==========

        # See all the properties and methods available in the $request object
        dump($request);

        # See just the form data from the $request object
        dump($request->all());

        # See just the form data for a specific input, in this case a text input
        dump($request->input('searchTerm'));

        # See what the form data looks like for a checkbox
        dump($request->input('caseSensitive'));

        # Boolean to see if the request contains data for a particular field
        dump($request->has('searchTerm')); # Should be true
        dump($request->has('publishedYear')); # There's no publishedYear input, so this should be false

        # You can get more information about a request than just the data of the form, for example...
        dump($request->path()); # "books/search"
        dump($request->is('books/search')); # True
        dump($request->is('search')); # False
        dump($request->fullUrl()); # http://foobooks.loc/books/search
        dump($request->method()); # GET
        dump($request->isMethod('post')); # False

        # ======== End exploration of $request ==========

        return view('Refugee.search');
    }


    public function create(Request $request)
    {
        return view('Refugee.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'firstName' => 'required|min:3',
            'lastName' => 'required|min:3',
            'birthYear' => 'required|min:3',
            'city' => 'required|min:3',
            'cell_phone' => 'required|min:3',
        ]);
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $birthYear = $request->input('birthYear');
        $city = $request->input('city');
        $cell_phone = $request->input('cell_phone');
        $refugee = new Refugee();
        $refugee-> first_name = $firstName;
        $refugee-> last_name = $lastName;
        $refugee-> birth_year = $birthYear;
        $refugee-> city = $city;
        $refugee-> cell_phone = $cell_phone;
        $refugee->save();
        #
        #
        # [...Code will eventually go here to actually save this book to a database...]
        #
        #

        # Redirect the user to the page to view the book
        return redirect('/Refugee/' . $firstName);
    }

}
