@extends('layouts/app')
@section('content')
    <form action="{{ route('student.update', $editDetails->id) }}" method="post">
        @csrf

        <div class="form-group col-12">
            <label for="name">Name</label>
            <input class="form-control col-6 " type="text" name="name" value="{{ $editDetails->name }}" >
            @if($errors->has('name'))
                <strong style="color: red">{{ $errors->first('name') }}</strong><br>
            @endif

            <label for="email">Email</label>
            <input class="form-control col-6 " type="text" name="email" value="{{ $editDetails->email }}" >
            @if($errors->has('email'))
                <strong style="color: red">{{ $errors->first('email') }}</strong><br>
            @endif

            <label for="from">From</label>
            <input class="form-control col-6 " type="text" name="from" value="{{ $editDetails->from }}" >
            @if($errors->has('from'))
                <strong style="color: red">{{ $errors->first('from') }}</strong><br>
            @endif

            <label for="to">To</label>
            <input class="form-control col-6 " type="text" name="to" value="{{ $editDetails->to }}" >
            @if($errors->has('to'))
                <strong style="color: red">{{ $errors->first('to') }}</strong><br>
            @endif

            <label for="role">Role</label>
            <select name="role" class="form-control col-6 ">

                @foreach($editDetails->roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                    <option value="">Assign Another role</option>
                    @foreach($allRoles->except($editDetails->roles->first()->id) as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
            </select>
            @if($errors->has('role'))
                <strong style="color: red">{{ $errors->first('role') }}</strong><br>
            @endif

        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>

@endsection
