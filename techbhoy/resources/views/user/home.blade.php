@extends('layouts.app')

@section('content')
<div class="card">
    <div style="text-align: center;">
        <h1 style="color: #4a5568; margin-bottom: 1rem;"> Congratulations!</h1>
        <h2 style="color: #667eea; margin-bottom: 2rem;">Welcome, {{ $user->name }}!</h2>
        
        <div style="background: linear-gradient(135deg, #ffd89b 0%, #19547b 100%); padding: 2rem; border-radius: 10px; margin: 2rem 0; color: white;">
            <h3 style="margin: 0 0 1rem 0; font-size: 1.5rem;"> Atik ra bitaw </h3>
            <p style="margin: 0; font-size: 1.1rem;">pag logout na HAHAHAHAHAHAHAHAHAHAH!</p>
        </div>
        
        <div style="background: #f7fafc; padding: 1.5rem; border-radius: 8px; margin: 1.5rem 0;">
            <h4 style="color: #4a5568; margin-bottom: 1rem;">Account Information</h4>
            <p style="color: #718096; margin: 0.5rem 0;"><strong>Username:</strong> {{ $user->username }}</p>
            <p style="color: #718096; margin: 0.5rem 0;"><strong>Member Since:</strong> {{ $user->created_at->format('F j, Y') }}</p>
            <p style="color: #718096; margin: 0.5rem 0;"><strong>Account Status:</strong> <span style="color: #38a169; font-weight: 600;">Active</span></p>
        </div>

        <div style="margin-top: 2rem;">
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn" style="background: #e53e3e; color: white;">
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
