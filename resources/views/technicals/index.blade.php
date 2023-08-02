@extends('layouts.app')

@section('template_title')
    Technical
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Technical') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('technicals.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Active</th>
										<th>Name</th>
										<th>Phone</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($technicals as $technical)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $technical->active }}</td>
											<td>{{ $technical->name }}</td>
											<td>{{ $technical->phone }}</td>

                                            <td>
                                                <form action="{{ route('technicals.destroy',$technical->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('technicals.show',$technical->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('technicals.edit',$technical->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $technicals->links() !!}
            </div>
        </div>
    </div>
@endsection
