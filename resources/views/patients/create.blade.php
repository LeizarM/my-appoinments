@extends('layouts.panel')

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">New Patient</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('patients') }}" class="btn btn-sm btn-default">
                  Back
                </a>
              </div>
          </div>
        </div>

        <div class="card-body">
            @if ( $errors->any() )
                <ul>
                    @foreach ( $errors->all() as $error )
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="{{ url('patients') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name patients</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name Patient" value="{{ old('name') }}" >
                </div>

                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="E-Mail" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input type="text" class="form-control" name="dni" id="dni" placeholder="DNI" value="{{ old('dni') }}">
                </div>

                <div class="form-group">
                    <label for="dni">Address</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{ old('address') }}">
                </div>

                <div class="form-group">
                    <label for="dni">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" value="{{ old('phone') }}">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>

        </div>
      </div>


@endsection
