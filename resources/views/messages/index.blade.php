@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Messages</h1>

    @if($messages->isEmpty())
        <div class="alert alert-info">No messages found.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Patient ID</th>
                    <th>Content</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->patient_id }}</td>
                        <td>{{ $message->content }}</td>
                        <td>{{ $message->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
