@extends('admin.layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
          <section class="section">
            <div class="section-header">
                    
              <h1>Table</h1>
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
              </div>
            </div>
  
            <div class="section-body">
              <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Simple Table</h4>
                      <div class="ml-auto">
                              <form action="{{route('admin.slider.create')}}">
                              <button class="btn btn-primary">+ Create New</button>
                              </form>
                      </div>
                    </div>
                    <div class="card-body">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
@endsection