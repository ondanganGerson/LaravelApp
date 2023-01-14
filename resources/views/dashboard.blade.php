<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if(session()->has('save'))
        <div class="row" id="save" style="padding-top: 20px">
        <div class="alert alert-success" style="width: 35%" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Notification: </strong>{{ session()->get('save') }}
        </div>
        </div>
    @endif

    <h1 style="margin-top: 20px; margin-left: 15px; font-weight: bold; font-size: 30px">Post</h1>

    <form method="POST" action="/post">
        @csrf
        <div class="col-md-4" style="padding-top: 20px">
            <div class="form-group">
                <label for="exampleInputPassword1">Title</label>
                <input type="text" class="form-control" name="title" id="exampleInputPassword1">

                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <input type="text" class="form-control" name="description" id="exampleInputPassword1">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button  style="color: black; font-weight: bold" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>    
    
</x-app-layout>
