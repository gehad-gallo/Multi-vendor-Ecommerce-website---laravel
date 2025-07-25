@extends('front_end.layouts.master')
@section('content')
          <!-- sections -->
          @include('front_end.sections.mobile_menu')
          @include('front_end.sections.product_model_view')
          @include('front_end.sections.banner_part_2')
          @include('front_end.sections.flash_sell')
          @include('front_end.sections.monthly_top_product')
          @include('front_end.sections.brand_slider')
          @include('front_end.sections.single_banner')
          @include('front_end.sections.hot_deals')
          @include('front_end.sections.electronic_part_1')
          @include('front_end.sections.electronic_part_2')
          @include('front_end.sections.large_banner')
          @include('front_end.sections.weekly_best_item')
          @include('front_end.sections.home_service')
          @include('front_end.sections.home_blogs')
@endsection

@push('scripts')
      <script>
          $(document).ready(function(){
              $('.banner_slider').slick({
                  infinite: true,
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  autoplay: true,
                  autoplaySpeed: 250,
                  dots: false 

              });
          });
      </script>
@endpush