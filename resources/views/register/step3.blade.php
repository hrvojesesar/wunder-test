<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Step 3</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Step 3: Payment Information</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/register/step3">
                            @csrf
                            <div class="form-group">
                                <label for="account_owner">Account Owner:</label>
                                <input type="text" class="form-control" id="account_owner" name="account_owner" value="{{ session('account_owner') }}" required maxlength="255">
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="iban">IBAN:</label>
                                <input type="text" class="form-control" id="iban" name="iban" value="{{ session('iban') }}">
                            </div>
                            <br />
                            <br />
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Next</button>
                                <a href="/register/step2" class="btn btn-danger">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>