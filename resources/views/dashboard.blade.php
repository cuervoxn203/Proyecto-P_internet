{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p>Hello, World!</p>
            </div>
        </div>
    </div>

    {{-- Additional script push from "Diego's branch" --}}
    @push('scripts')
        <script src="{{ mix('js/app.js') }}"></script>
    @endpush
@endsection
