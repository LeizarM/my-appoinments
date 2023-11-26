@extends('layouts.panel')

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">New Specialty</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('specialties') }}" class="btn btn-sm btn-default">
                  Back
                </a>
              </div>
          </div>
        </div>

        <div class="card-body">

            <form action="{{ url('specialties') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name Specialty</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name Specialty">
                </div>

                <div class="form-group">
                    <label for="name">Description</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>

        </div>
      </div>


@endsection
