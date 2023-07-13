@extends('layouts.app')

@section('template_title')
    {{ $technical->name ?? "{{ __('Show') Technical" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Technical</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('technicals.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Active:</strong>
                            {{ $technical->active }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $technical->name }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $technical->phone }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
