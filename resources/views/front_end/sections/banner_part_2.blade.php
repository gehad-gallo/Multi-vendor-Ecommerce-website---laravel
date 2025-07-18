x<!--============================
          BANNER PART 2 START
      ==============================-->
      <section id="wsus__banner">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="wsus__banner_content">
                        <div class="row banner_slider">
                            @if(isset($sliders))
                                @foreach ($sliders as $slider)
                                    <div class="wsus__single_slider" style="background: url({{ asset($slider->banner) }});">
                                        <div class="wsus__single_slider_text">
                                            <h3>{{ $slider->title }}</h3>
                                            <h1>{{ $slider->type }}</h1>
                                            <h6>Start at ${{ $slider->starting_price }} </h6>
                                            <a class="common_btn" href="{{ $slider->btn_url }}">Shop Now</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                      </div>
                  </div>
                  
              </div>
          </div>
      </section>
      <!--============================
          BANNER PART 2 END
      ==============================-->
  