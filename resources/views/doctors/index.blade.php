@extends('layouts.panel')

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Doctors</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url('doctors/create') }}" class="btn btn-sm btn-success">
                New Doctor
              </a>
            </div>
          </div>
        </div>

        @if ( session('notification'))
            <div class="card-body">
                <div class="alert alert-success" role="alert">
                    {{ session('notification') }}
                </div>
            </div>
        @endif


        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">DNI</th>
                <th scope="col">Actions</th>

              </tr>
            </thead>
            <tbody>
            @foreach ( $doctors as $doctor )

              <tr>
                <th scope="row">
                  {{ $doctor->name }}
                </th>
                <td>
                  {{ $doctor->email }}
                </td>
                <td>
                    {{ $doctor->dni }}
                  </td>
                <td>

                  <form action="{{ url( '/doctors/'.$doctor->id ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ url('doctors/'.$doctor->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </td>
              </tr>

            @endforeach
            </tbody>
          </table>
        </div>
      </div>


@endsection
