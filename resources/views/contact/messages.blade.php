@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Messages</h2>

    @if($messages->count() > 0)
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Patient Name</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $msg)
                    <tr>
                        <td>{{ $msg->id }}</td>
                        <td>{{ $msg->patient->patient_name ?? 'Unknown' }}</td>
                        <td>{{ $msg->message }}</td>
                        <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No messages found.</p>
    @endif
</div>
@endsection
