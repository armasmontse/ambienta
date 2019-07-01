<?php

namespace App\Http\Controllers\Client;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Mail\ContactMail;
use App\Mail\ThanksForContactMail;

use App\Http\Requests\Client\CreateContactRequest;

use App\Http\Controllers\ClientController;

use App\Notifications\Client\ContactNotification;
use App\Notifications\Client\ThanksForContactNotification;

use View;
use Redirect;
use App\Models\Pages\Page;
use Validator;

class PagesController extends ClientController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_page = Page::getMainPage();
        /*if (!$main_page || !$main_page->is_publish || !env("CLTVO_OPEN_SITE")) {

            return view("client.pages.splash");
        }*/

        $data = [
            "main_page"  => $main_page,
        ];

        return view("client.pages.index",$data);
    }

    public function show(Page $public_page)
    {
        $data = [
            "public_page"  => $public_page,
        ];

        return view("client.pages.show",$data);
    }

    public function showChild(Page $public_page, Page $public_child_page)
    {

        $data = [
            "public_page"  => $public_page,
            "public_child_page"  => $public_child_page,
        ];

        return view("client.pages.show-child",$data);

    }

	public function contact(CreateContactRequest $request)
    {
        $input = $request->all();

		ContactNotification::SystemNotify($input);

		ThanksForContactNotification::NotUserNotify($input);

        return Redirect::back()->with('status', trans("contact_form.sended.success") );
    }

}
