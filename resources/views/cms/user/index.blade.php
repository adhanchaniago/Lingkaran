@extends('cms.layouts.app')

@section('content')
<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <h2>Users <small>All users list and access</small></h2>
            <button onclick="location.href='{{ route('user.create') }}'" class="btn btn-primary btn-sm float-right"><i
                    class="fa fa-plus"> User</i></button>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}.
            </div>
            @endif
            @foreach ($users as $user)
            <div class="col-md-3 cold-sm-12">
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-center">
                        <img src="
                        @foreach ($user->profiles as $profile)
                            {{ (!empty($profile->image) ? asset('images/profile/'. $profile->image) : asset('cms/images/user.png')) }}"
                            @endforeach class="card-img rounded-pill img-fluid" style="width: 100px;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->firstname }} {{ $user->lastname }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $user->roles->first()->name }} |
                            @if ($user->status == 1)
                            <span class="text-success">Active</span>
                            @else
                            <span class="text-danger">Suspended</span>
                            @endif
                        </h6>
                        <p class="card-text">
                            @foreach ($user->roles->first()->permissions as $permission)
                            <span class="badge badge-secondary">{{ $permission->name }}</span>
                            @endforeach
                        </p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item pl-0"><i class="fa fa-home"></i>
                                {{ $user->profiles->first()->address }}</li>
                            <li class="list-group-item pl-0"><i class="fa fa-phone"></i>
                                {{ $user->profiles->first()->phone }}</li>
                        </ul>
                        <div class="mt-2">
                            @if ($user->id != auth()->id())
                            <a href="{{ route('user.show', $user) }}" class="card-link text-info"><i class="fa fa-user">
                                    Profile</i></a>
                            <a href="#" class="card-link text-primary" id="btn-status" data-toggle="modal"
                                data-target="#modal-status" data-id="{{ $user->id }}"
                                data-name="{{ $user->firstname }}"><i class="fa fa-ban"> Status</i></a>
                            @if (empty($user->posts->first()))
                            <a href="#" class="card-link text-danger"><i class="fa fa-trash"></i> Delete</a>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-md-12 col-sm-12">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-status" tabindex="-1" data-backdrop="static" role="dialog"
    aria-labelledby="modal-status" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Status User</h5>
            </div>
            <form action="{{ route('user.status', 'id') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <p class="text-center">Anda akan mengubah status <span class="text-info" id="name">null</span></p>
                    <input type="hidden" id="id" name="id">

                    <div class="form-group">
                        <label for="status">User Status</label>
                        <select class="form-control form-control-sm @error('status') is-invalid @enderror" id="status"
                            name="status">
                            <option></option>
                            <option value="1">Active</option>
                            <option value="0">Suspend</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#modal-status').on('show.bs.modal', function(e){
            const id = $(e.relatedTarget).data('id');
            const name = $(e.relatedTarget).data('name');
            $('.modal-body #id').val(id);
            $('.modal-body #name').text(name);
        });
</script>
@endsection