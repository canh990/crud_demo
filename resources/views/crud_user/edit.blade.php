@extends('dashboard')

@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Update User</h3>
                        <div class="card-body">
                            <form action="{{ route('user.saveUser', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <input name="id" type="hidden" value="{{ $user->id }}">

                                <div class="form-group mb-3">
                                    <input
                                        type="text"
                                        placeholder="Username"
                                        id="name"
                                        class="form-control"
                                        name="name"
                                        value="{{ old('name', $user->name) }}"
                                        required
                                        autofocus
                                    >
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input
                                        type="text"
                                        placeholder="Like"
                                        id="like"
                                        class="form-control"
                                        name="like"
                                        value="{{ old('like', $user->like) }}"
                                    >
                                    @if ($errors->has('like'))
                                        <span class="text-danger">{{ $errors->first('like') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input
                                        type="email"
                                        placeholder="Email"
                                        id="email_address"
                                        class="form-control"
                                        name="email"
                                        value="{{ old('email', $user->email) }}"
                                        required
                                    >
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
