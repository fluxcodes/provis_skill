<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Prompt</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Active Session</h5>
                        <input type="hidden" id="userIp" value="{{ $userIp }}">
                        <p class="card-text">You have an active session. Do you want to continue?</p>
                        <button id="continue-btn" class="btn btn-success">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>

        // Getting ip address received in form.
        var userIp = document.getElementById('userIp').value;

        document.getElementById('continue-btn').addEventListener('click', function () {

            // Redirect to a route to close the session and redirect to dashboard
            window.location = "{{ route('close_session_and_redirect', ) }}?ip=" + userIp;
        });
    </script>
</body>

</html>