@unless ($section->components->isEmpty())
  <div class="about">
    <div class="about--wrap wrap">
      <div class="about--ttl">
        {{ $section->components[0]->title }}
      </div>
      <div class="about--wrap--row">
        <div class="about__col-1-2">
          <img src="{!!$section->components[0]->thumbnail_image->url!!}" alt="">
        </div>
        <div class="about__col-1-2">
          <div class="about--txt">
            {!! $section->components[0]->content !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endunless 
