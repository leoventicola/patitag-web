<div>
    @if ($modal)
    <div class="modal fade show" tabindex="-1" aria-labelledby="exampleModalFullscreen" style="display: block; padding-right: 13px;" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title h4" id="exampleModalXlLabel">{{__('main.Post')}}</h5>
            <button type="button" class="btn-close" aria-label="Close" wire:click="openModal(false)"></button>
          </div>
          <form action="" wire:submit.prevent="save">
            <div class="modal-body" style="overflow: auto; background-color:#f4f6f9;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="first_name">{{__('main.first_name')}}</label>
                                    <input wire:model.lazy="first_name" id="first_name" type="text" class="form-control form-control-sm mb-2" placeholder="{{__('main.first_name')}}">
                                    @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="last_name">{{__('main.last_name')}}</label>
                                    <input wire:model.lazy="last_name" id="last_name" type="text" class="form-control form-control-sm mb-2 " placeholder="{{__('main.last_name')}}">
                                    @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">{{__('main.email')}}</label>
                                    <input wire:model.lazy="email" id="email" type="text" class="form-control form-control-sm mb-2 " placeholder="{{__('main.email')}}">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="slug">{{__('main.password')}}</label>
                                    <input wire:model.lazy="password" id="password" type="password" class="form-control form-control-sm mb-2 " placeholder="{{__('main.password')}}">
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-sm float-end">{{__('main.Save')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    @endif
    <h1 class="text-center">{{__('main.Users')}}</h1>
    <button type="button" class="btn btn-success btn-sm float-end mx-3" wire:click="create">{{__('main.Add New')}}</button>
    <div class="clearfix"></div>
    <div class="table-responsive px-3">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>{{__('main.email')}}</th>
          <th>{{__('main.first_name')}}</th>
          <th>{{__('main.last_name')}}</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @if (is_array($users) || is_object($users))
          @foreach ($users as $user)
          <tr>
            <td>{{$user->email}}</td>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td style="width: 75px">
                <button wire:click="edit({{$user->id}})" type="button" class="btn btn-sm"><i class="fas fa-edit text-primary"></i></button>
                <button wire:click="delete({{$user->id}})" type="button" class="btn btn-sm"><i class="fas fa-times text-danger"></i></button>
            </td>
          </tr>
          @endforeach
        @endif
      </tbody>
    </table>
    </div>
</div>
