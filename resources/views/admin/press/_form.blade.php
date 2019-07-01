{!! Form::open([
    'method'             => $form_method,
    'route'              => $form_route,
    'role'               => 'form' ,
    'id'                 => $form_id,
    'class'              => '',
    'files'            => true
    ]) !!}

    <div class="col s3 offset-s5 input-field">

        {!! Form::select('publish_id', $publishes_list, $press->publish_id, [
            'class'      => 'validate ',
            'required'    => 'required',
            'placeholder'   => "Seleccionar",
            'form'        => $form_id,
        ])  !!}

        {!! Form::label('publish_id', "Estatus de publicación:", [
            'class' => 'input-label active '
        ]) !!}


    </div>

    <div class="col s3 input-field">

            {!! Form::date('publish_at', $press->id ? $press->publish_at->format("Y-m-d") : date("Y-m-d"), [
                'class'        => 'validate  datepicker ',
                'required'     => 'required',
                'placeholder'  => date("Y-m-d"),
                'form'         => $form_id,
            ])  !!}
            {!! Form::label('publish_at', "Fecha de publicación:", [
                'class' => 'input-label active'
            ]) !!}

    </div>

    <div class="col s10 offset-s1 input-field">
        {!! Form::label('title',"Título de prensa:", [
              'class' => 'active',
            ])
        !!}

        {!! Form::text('title', $press->title ? $press->title : null, [
                'class'         => 'validate',
                'required'      => 'required',
                'form'          => $form_id,
                'placeholder'   => ""])
        !!}
    </div>

    <div class="col s3 offset-s1 input-field">
        {!! Form::select('content_type', $content_types, $press->content_type, [
            'class'      => 'validate ',
            'required'    => 'required',
            'id' => 'content-type',
            'placeholder'   => "Seleccionar",
            'form'        => $form_id,
        ])  !!}
        {!! Form::label('publish_id', "Tipo de publicación:", [
            'class' => 'input-label active '
        ]) !!}
    </div>

    <!-- Tipo de contenido -->
    <div id="div-link" class="input-field col s6 offset-s1">
        {!! Form::label('post_title',"Link de youtube:", [
              'class' => 'active',
            ])
        !!}

        {!! Form::url('content_link', $press->content, [
              'id'         => 'content-url',
              'form'          => $form_id,
              'placeholder'   => ""
            ])
        !!}
    </div>

    <div id="div-file" class="file-field input-field col s6 offset-s1 hide">
        <div class="btn">
            <span>PDF</span>
            {!! Form::file('content_pdf', [
                    'id' => 'content-file',
                    'form' => $form_id,
                    'placeholder' => "",
                    'accept' => 'application/pdf,application/vnd.ms-excel'
                ])
            !!}
        </div>
        <div class="file-path-wrapper">
            {!! Form::text('content_text', $press->content, [
                  'class'         => 'file-path validate',
                  'id'            => 'content-text',
                  'form'          => $form_id,
                  'placeholder'   => ""
                ])
            !!}
        </div>
    </div>

    @if(str_contains($form_id, 'create'))
        <div id="div-message" class="col s6 offset-s1 hide">
            <br>
            <div class="blue-text ">Selecciona la imagen despues de guardar el contenido</div>
        </div>
    @endif

    <div class="col s10 offset-s1">
		<br><br>
        <div class="pull-right">
            {!! Form::submit("Guardar", [
                'class' => 'btn waves-effect waves-light  flex-collapsible black',
                'form'  => $form_id
            ]) !!}
        </div>
    </div>
{!! Form::close() !!}

<script type="text/javascript">
    $(document).ready(function() {
        var element = $('#content-type').val() === '' ? 'Link' : $('#content-type').val();
        changeElement(element);

        $('#content-type').change(function(){
            $('#div-message').addClass('hide');
            changeElement($('#content-type').val())
        });

        function changeElement(element){
            switch(element){
                case 'PDF':
                    $('#content-url').val('');
                    $('#div-link').addClass('hide');
                    $('#content-url').prop('required', false);

                    $('#div-file').removeClass('hide');
                break;

                case 'Link':
                    $('#content-file').val('');
                    $('#content-text').val('');
                    $('#div-file').addClass('hide');
                    $('#content-file').attr('required', false);

                    $('#div-link').removeClass('hide');
                    $('#content-url').attr('required', true);
                break;

                case 'Image':
                    $('#content-url').val('');
                    $('#div-file').addClass('hide');
                    $('#div-link').addClass('hide');
                    $('#content-url').prop('required', false);
                    $('#content-file').prop('required', false);

                    $('#div-message').removeClass('hide');
                break;
            }
        }
    });
</script>
