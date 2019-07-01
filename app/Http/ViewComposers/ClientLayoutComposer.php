<?php
namespace App\Http\ViewComposers;

use Auth;

use Illuminate\Contracts\View\View;

use App\Models\Settings\Setting;
use App\Models\Seo\Seo;
use App\Models\Pages\Sections\Section;

class ClientLayoutComposer
{
	public function compose(View $view)
	{
        $view->with('social_networks', Setting::getSocialNetworks());
		
        $view->with('contact_address', Setting::getContact());
        $view->with('contact_mail', Setting::getEmail('contact'));
        $view->with('seo', Seo::getForCurrentRoute());

		if (is_page('client::pages.index')) {
			$home_slider = Section::where(['index' => 'home-slider'])->first();
			$view->with('home_slider', $home_slider);
		}
	}
}
