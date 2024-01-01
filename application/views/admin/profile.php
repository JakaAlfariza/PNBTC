<!-- application/views/your_view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .edit-btn,
        .update-btn {
            cursor: pointer;
        }

        .update-btn {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Edit Data</h2>

        <?php foreach ($hasil as $row): ?>
            <?php
            // Assuming $logged_in_user_id is the ID of the logged-in user
            if ($row->id == $id):
            ?>
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $row->nama; ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $row->email; ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="text" class="form-control" name="password" value="<?php echo $row->password; ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $row->username; ?>" disabled>
                </div>

                <div class="form-group">
                    <a href="#" class="edit-btn btn btn-primary" data-id="<?php echo $row->id; ?>">Edit</a>
                    <button class="update-btn btn btn-success" data-id="<?php echo $row->id; ?>">Update</button>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            // Edit button click event
            $('.edit-btn').click(function () {
                var rowId = $(this).data('id');

                // Enable the input fields for the specific row
                $('input[data-id="' + rowId + '"]').prop('disabled', false);

                // Disable the edit button to prevent multiple clicks
                $(this).prop('disabled', true);

                // Show the update button for the specific row
                $('.update-btn[data-id="' + rowId + '"]').show();
            });

            // Update button click event
            $('.update-btn').click(function () {
                var rowId = $(this).data('id');

                // You can retrieve the updated values and send them to the server using AJAX
                var updatedValues = {
                    nama: $('input[name="nama"][data-id="' + rowId + '"]').val(),
                    email: $('input[name="email"][data-id="' + rowId + '"]').val(),
                    password: $('input[name="password"][data-id="' + rowId + '"]').val(),
                    username: $('input[name="username"][data-id="' + rowId + '"]').val(),
                };

                // Send the updated values to the server using AJAX (you need to implement this part)
                // ...

                // After updating, enable the edit button and hide the update button
                $('.edit-btn[data-id="' + rowId + '"]').prop('disabled', false);
                $('.update-btn[data-id="' + rowId + '"]').hide();
            });
        });
    </script>

</body>

</html>
