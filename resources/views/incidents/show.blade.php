@extends('layouts.app')

@section('template_title')
    {{ $incident->name ?? "{{ __('Show') Incident" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Incident</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('incidents.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Technical Id:</strong>
                            {{ $incident->technical_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $incident->name }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $incident->address }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $incident->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
