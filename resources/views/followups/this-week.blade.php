@extends('main')

@section('title', 'This Week\'s Follow-Ups')

@section('content')
<div class="content-wrapper">
    <!-- Header -->
    <div class="content-header sty-one">
        <h1>This Week's Follow-Ups</h1>
        <ol class="breadcrumb">
            <li><a href="">Leads</a></li>
        </ol>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="card">
            <div class="card-body">
                <h4 class="text-black mb-4">Follow-Ups Scheduled for This Week</h4>
                <p class="text-muted mb-4">Showing follow-ups from {{ \Carbon\Carbon::tomorrow()->format('d M Y') }} to {{ \Carbon\Carbon::now()->endOfWeek()->format('d M Y') }}</p>

                @forelse($followUps as $followUp)
                    <div class="card mb-3 shadow-sm border rounded p-3">
                        <div class="d-flex justify-content-between flex-wrap">
                            <div>
                                <h5 class="mb-2">{{ $followUp->lead->first_name }} {{ $followUp->lead->last_name }}</h5>
                                <p class="mb-1"><strong>Date:</strong> {{ \Carbon\Carbon::parse($followUp->follow_up_time)->format('d M Y') }}</p>
                                <p class="mb-1"><strong>Time:</strong> {{ \Carbon\Carbon::parse($followUp->follow_up_time)->format('h:i A') }}</p>
                                <p class="mb-1"><strong>Agent:</strong> {{ $followUp->agent->emp_name ?? 'N/A' }}</p>
                                <p class="mb-2"><strong>Comments:</strong> {{ $followUp->comments }}</p>
                            </div>
                            <div class="d-flex align-items-start justify-content-end">
                                <a href="{{ url('/i-admin/leads/view/'.$followUp->lead_id) }}" class="btn btn-primary btn-sm mt-2">View Lead</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info text-center">
                        No follow-ups scheduled for this week.
                    </div>
                @endforelse

                <!-- Back Button -->
                <a href="{{ url('/i-admin/show-leads') }}" class="btn btn-secondary mt-4">Back to Leads</a>
            </div>
        </div>
    </div>
</div>
@endsection
