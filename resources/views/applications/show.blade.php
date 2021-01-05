@extends('layouts/app')

@section('title')
    {{ $application->user->lastname }} for {{ $application->job->name }}
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <div class="jobsWrapper bg-light">
        <div class="container">
            <div class="top">
                <h1>Application for {{ $application->job->name }}</h1>
                <h3>by {{ $application->user->firstname }} {{ $application->user->lastname }}</h3>
                <p>on {{ $application->updated_at }} — {{ $application->label->name }} </p><button type="button"
                    class="btn btn-primary label" onclick='openModal()'>change label</button>
            </div>
        </div>

        <br>

        <div class="container">
            <div class="letter"> </div>
            <article>{{ $application->message }}</article>

            <br>

            <div class="cv">
                @if (isset($application->cv))
                    <a href="{{ $application->dribbble_url }}"></a>
                    <p>{{ $application->cv }}</p>
                @else
                    <p>No cv submitted.</p>
                @endif
            </div>

            <br>

            <div class="portfolio">
                @if (isset($application->dribbble_url))
                    <a href="{{ $application->dribbble_url }}"></a>
                    <p>{{ $application->portfolio }}</p>
                @else
                    <p>No portfolio submitted.</p>
                @endif
            </div>

            <div class="contact">
                <h5>Contact information</h4>
                    @if (isset($application->user->email))
                        <a href="mailto:{{ $application->user->email }}">{{ $application->user->email }}</a>
                    @else
                        <p>No email given.</p>
                    @endif
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
            role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Application label</h5>
                        <button type="button" class="close" aria-label="Close" onclick="closeModal()">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="{{ route('labels', ['application' => $application->id]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <label for="label">Change label</label>
                            <select name="label" id="label">
                                <option value="1">new</option>
                                <option value="2">star</option>
                                <option value="3">approve</option>
                                <option value="4">decline</option>
                                <option value="5">test</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>
    </div>

    <script>
        function openModal() {
            document.getElementById("backdrop").style.display = "block"
            document.getElementById("exampleModal").style.display = "block"
            document.getElementById("exampleModal").className += "show"
        }

        function closeModal() {
            document.getElementById("backdrop").style.display = "none"
            document.getElementById("exampleModal").style.display = "none"
            document.getElementById("exampleModal").className += document.getElementById("exampleModal").className.replace(
                "show", "")
        }
        // Get the modal
        var modal = document.getElementById('exampleModal');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal()
            }
        }

    </script>

@endsection
