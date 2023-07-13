@extends('layouts.app')

@section('template_title')
    Incident
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Incident') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('incident.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nueva Incidencia') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Tecnico</th>
										<th>Nombre</th>
										<th>Direcci{on</th>
										<th>Descripcíon</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($incidents as $incident)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $incident->technical_id }}</td>
											<td>{{ $incident->name }}</td>
											<td>{{ $incident->address }}</td>
											<td>{{ $incident->description }}</td>

                                            <td>
                                                <form action="{{ route('incidents.destroy',$incident->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('incidents.show',$incident->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('incidents.edit',$incident->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $incidents->links() !!}
            </div>
        </div>
    </div>
@endsection
