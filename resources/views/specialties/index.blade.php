@extends('layouts.panel')

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Specialties</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url('specialties/create') }}" class="btn btn-sm btn-success">
                New Specialty
              </a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">
                  /argon/
                </th>
                <td>
                  4,569
                </td>
                <td>
                  <a href="#" class="btn btn-primary btn-sm">Edit</a>
                  <a href="#" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>


            </tbody>
          </table>
        </div>
      </div>


@endsection
