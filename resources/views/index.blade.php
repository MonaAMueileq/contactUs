@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2 m-auto">
        <div class="contact-form">
            <h3>Contact List</h1>
                <a href="{{url('contact')}}" class="btn btn-primary">Add New Contact</a>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Email Address</th>
                  <th scope="col">&nbsp</th>
                  <th scope="col">&nbsp</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($contacts as $contact)
                <tr>
                  <th scope="row">1</th>
                  <td>{{$contact->FName}}</td>
                  <td>{{$contact->LName}}</td>
                  <td>{{$contact->email}}</td>
                  <td>
                    <form action="{{url('destroy/'.$contact->id)}}" method="post">
                        @csrf
                        @method('Delete')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
                  <td>
                      <form action="{{url('edit/'.$contact->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">Edit</button>
                      </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
