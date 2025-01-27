<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Step 1</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 align="center">Step 1: Personal Information</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/register/step1">
                            @csrf
                            <div class="form-group">
                                <label for="first_name"><strong>First Name:</strong></label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ session('first_name') }}" required maxlength="20">
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="last_name"><strong>Last Name:</strong></label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required value="{{ session('last_name') }}" maxlength="20">
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="telephone"><strong>Telephone:</strong></label>
                                <input type="tel" class="form-control" id="telephone" name="telephone" required value="{{ session('telephone') }}" maxlength="15">
                            </div>
                            <br />
                            <br />
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Go to Step 2</button>
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