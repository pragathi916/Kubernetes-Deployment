<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up Page</title>
  <style>
    body {
      background-image: url('bg.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .signup-container {
      width: 400px;
      padding: 20px 50px 50px 50px;
      background-color: bisque;
      border: 1px solid #ebebeb;
      border-radius: 3px;
      font-size: 20px;
    }

    table {
      width: 100%;
    }

    td {
      padding: 8px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: none;
      background-color: #990011;
      color: #FCF6F5;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #80080E;
    }

    h2 {
      text-align: center;
      color: #990011;
    }

    .error-message {
      color: red;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="signup-container">
    <h2>Sign up</h2>

    <?php
    include("connection.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $type = $_POST['med'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Check if table exists
        $check_table = mysqli_query($con, "SHOW TABLES LIKE 'registration'");
        if (mysqli_num_rows($check_table) == 0) {
            die("⚠️ Error: 'registration' table does not exist in the database.");
        }

        // Check if username exists
        $stmt_check = mysqli_prepare($con, "SELECT username FROM registration WHERE username = ?");
        if (!$stmt_check) {
            die("❌ Prepare failed (check username): " . mysqli_error($con));
        }

        mysqli_stmt_bind_param($stmt_check, "s", $username);
        mysqli_stmt_execute($stmt_check);
        $result_check = mysqli_stmt_get_result($stmt_check);

        if (mysqli_num_rows($result_check) > 0) {
            echo "<script>alert('Username already exists. Please choose a different one.');</script>";
        } else {
            $stmt_insert = mysqli_prepare($con, "INSERT INTO registration (username, email, password, usertype) VALUES (?, ?, ?, ?)");
            if (!$stmt_insert) {
                die("❌ Prepare failed (insert): " . mysqli_error($con));
            }

            mysqli_stmt_bind_param($stmt_insert, "ssss", $username, $email, $password, $type);
            if (mysqli_stmt_execute($stmt_insert)) {
                echo "<script>alert('✅ Registration successful!');</script>";
                echo '<meta http-equiv="refresh" content="2;url=login.php">';
                exit;
            } else {
                echo "<script>alert('Error: " . mysqli_stmt_error($stmt_insert) . "');</script>";
            }

            mysqli_stmt_close($stmt_insert);
        }

        mysqli_stmt_close($stmt_check);
        mysqli_close($con);
    }
    ?>

    <form action="" method="post" onsubmit="return validateForm();">
      <table>
        <tr>
          <td><input type="radio" name="med" id="medical" value="medical"><label for="medical">Medical Institute</label></td>
          <td><input type="radio" name="med" id="individual" value="individual"><label for="individual">Individual</label></td>
        </tr>
        <tr>
          <td>UserName:</td>
          <td><input type="text" name="username" id="username" required></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td><input type="email" name="email" id="email" required></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input type="password" name="password" id="password" required></td>
        </tr>
        <tr>
          <td>Confirm Password:</td>
          <td><input type="password" name="confirmpassword" id="confirmpassword" required></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" value="Register"></td>
        </tr>
      </table>
    </form>
  </div>

  <script>
    function validateForm() {
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirmpassword").value;
      const isMedical = document.getElementById("medical").checked;
      const isIndividual = document.getElementById("individual").checked;

      if (!isMedical && !isIndividual) {
        alert("Please select a user type.");
        return false;
      }

      if (password !== confirmPassword) {
        alert("Password did not match. Please try again.");
        return false;
      }

      return true;
    }
  </script>
</body>
</html>
