<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Step 2</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 align="center">Step 2: Address Information</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/register/step2">
                            @csrf
                            <div class="form-group">
                                <label for="street"><strong>Street:</strong></label>
                                <input type="text" class="form-control" id="street" name="street" value="{{ session('street') }}" required maxlength="100">
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="house_number"><strong>House Number:</strong></label>
                                <input type="text" class="form-control" id="house_number" name="house_number" value="{{ session('house_number') }}" required maxlength="10">
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="zip_code"><strong>ZIP Code:</strong></label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ session('zip_code') }}" required maxlength="10">
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="city"><strong>City:</strong></label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ session('city') }}" required maxlength="100">
                            </div>
                            <br />
                            <br />
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Go to Step 3</button>
                                <a href="/register/step1" class="btn btn-danger">Back</a>
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