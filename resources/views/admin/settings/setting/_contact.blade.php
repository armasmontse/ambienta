@include('admin.general._page-subtitle', ['title' => trans('manage_settings.contact.title') ])
{!! Form::open([
      'method'              => 'PATCH',
      'route'               => ['admin::settings.update', 'contact'],
      'role'                => 'form' ,
      'id'                  => 'update_setting-contact_form',
      'class'               => "col s10 offset-s1"
]) !!}

    <div class="row ">

        <div class="input-field col s12 ">

            {!! Form::label('contact-address', trans('manage_settings.contact.address.label'), ['class' => '']) !!}

            {!! Form::text('address', array_get($setting_contact,'address'), [
                'class'         => 'validate',
                'form'          => 'update_setting-contact_form',
				"id"			=> 'contact-address',
                'placeholder'   => trans('manage_settings.contact.address.placeholder'),
                'required'      => 'required',
            ]) !!}

        </div>

		<div class="input-field col s6 ">

            {!! Form::label('contact-phone_1', trans('manage_settings.contact.phone_1.label'), ['class' => '']) !!}

            {!! Form::text('phone-1', array_get($setting_contact,'phone-1'), [
                'class'         => 'validate',
                'form'          => 'update_setting-contact_form',
				"id"			=> 'contact-phone_1',
                'placeholder'   => trans('manage_settings.contact.phone_1.placeholder'),
                'required'      => 'required',
            ]) !!}

        </div>

		<div class="input-field col s6 ">

			{!! Form::label('contact-phone_2', trans('manage_settings.contact.phone_2.label'), ['class' => '']) !!}

			{!! Form::text('phone-2', array_get($setting_contact,'phone-2'), [
				'class'         => 'validate',
				'form'          => 'update_setting-contact_form',
				"id"			=> 'contact-phone_2',
				'placeholder'   => trans('manage_settings.contact.phone_2.placeholder'),
				'required'      => 'required',
			]) !!}

		</div>

		<div class="input-field col s6 ">

			{!! Form::label('whatsapp-phone', trans('manage_settings.contact.whatsapp_phone.label'), ['class' => '']) !!}

			{!! Form::text('whatsapp_phone', array_get($setting_contact,'whatsapp_phone'), [
				'class'         => 'validate',
				'form'          => 'update_setting-contact_form',
				"id"			=> 'whatsapp_phone',
				'placeholder'   => trans('manage_settings.contact.whatsapp_phone.placeholder'),
				'required'      => 'required',
			]) !!}

		</div>


        <div class="col s12">

            <div class="pull-right">
                {!! Form::submit('guardar', [
                    'class' => 'btn waves-effect waves-light black',
                    'form'  => 'update_setting-contact_form',
                    ]) !!}
            </div>
        </div>
    </div>


{!! Form::close() !!}
