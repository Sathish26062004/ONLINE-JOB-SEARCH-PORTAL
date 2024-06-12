<?php
require 'uploads\dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #4000ff;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
        }

        .navbar-nav {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar-nav li {
            list-style-type: none;
            margin: 0 10px;
        }

        .navbar-nav form button {
            padding: 8px 16px;
            border-radius: 5px;
            background-color: #ddd;
            color: #333;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .navbar-nav form button:hover {
            background-color: #ccc;
        }

        .wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        section {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form class="d-flex" action="#" method="post">
                        <input type="hidden" value="view_jobs" name="n" />
                        <button class="btn btn-outline-dark me-2" type="submit" name="submit">View Jobs</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form class="d-flex" action="#" method="post">
                        <input type="hidden" value="view_company" name="n" />
                        <button class="btn btn-outline-dark me-2" type="submit" name="submit">View Company</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form class="d-flex" action="#" method="post">
                        <input type="hidden" value="Seekers Registers" name="n" />
                        <button class="btn btn-outline-dark me-2" type="submit" name="submit">Seekers Registers</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form class="d-flex" action="#" method="post">
                        <input type="hidden" value="Company Registers" name="n" />
                        <button class="btn btn-outline-dark me-2" type="submit" name="submit">Company Registers</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form class="d-flex" action="#" method="post">
                        <input type="hidden" value="view_feedbacks" name="n" />
                        <button class="btn btn-outline-dark" type="submit" name="submit">View Feedbacks</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="wrapper">
        <?php
        if (isset($_POST['submit'])) {
            if ($_POST['n'] == "view_jobs") {
                $sql = "select * from company1";
                $result = mysqli_query($db_connection, $sql);
                ?>
                <section id="view_jobs">
                    <h2>View Jobs</h2>
                    <table id="jobsTable">
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Company Name</th>
                                <th>Address</th>
                                <th>Job Type</th>
                                <th>Job Description</th>
                                <th>Skills</th>
                                <th>Location Preference</th>
                                <th>Contact Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['jobTitle']; ?></td>
                                    <td><?php echo $row['companyName']; ?></td>
                                    <td><?php echo $row['Address']; ?></td>
                                    <td><?php echo $row['jobType']; ?></td>
                                    <td><?php echo $row['jobDescription']; ?></td>
                                    <td><?php echo $row['skills']; ?></td>
                                    <td><?php echo $row['locationPreference']; ?></td>
                                    <td><?php echo $row['contactEmail']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            <?php
            } elseif ($_POST['n'] == "view_company") {
                $sql = "select * from companyregister";
                $result = mysqli_query($db_connection, $sql);
                ?>
                <section id="view_companies">
                    <h2>View Companies</h2>
                    <table id="companiesTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Company Name</th>
                                <th>Company Details</th>
                                <th>Company Address</th>
                                <th>Company Field</th>
                                <th>Company Office Mail</th>
                                <th>Company Office Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['company_name']; ?></td>
                                    <td><?php echo $row['company-details']; ?></td>
                                    <td><?php echo $row['company-address']; ?></td>
                                    <td><?php echo $row['company-field']; ?></td>
                                    <td><?php echo $row['company-office-mail']; ?></td>
                                    <td><?php echo $row['company-office-number']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            <?php
            } elseif ($_POST['n'] == "Seekers Registers") {
                $sql = "select * from personal1";
                $result = mysqli_query($db_connection, $sql);
                ?>
                <section id="view_seekers">
                    <h2>View Seekers</h2>
                    <table id="seekersTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Age</th>
                                <th>Date of Birth</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['age']; ?></td>
                                    <td><?php echo $row['dob']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            <?php
            } elseif ($_POST['n'] == "Company Registers") {
                $sql = "select * from companyregister";
                $result = mysqli_query($db_connection, $sql);
                ?>
                <section id="view_company_registers">
                    <h2>View Company Registers</h2>
                    <table id="companiesTable">
                        <thead>
                            <tr>
                            <th>Company Name</th>
                                <th>Company Details</th>
                                <th>Address</th>
                                <th>Company Field</th>
                                <th>Company Mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                <td><?php echo $row['company_name']; ?></td>
                                    <td><?php echo $row['company-details']; ?></td>
                                    <td><?php echo $row['company-address']; ?></td>
                                    <td><?php echo $row['company-field']; ?></td>
                                    <td><?php echo $row['company-office-number']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            <?php
            } else {
                $sql = "SELECT * FROM `feedback`";
                $result = mysqli_query($db_connection, $sql);
                ?>
                <section id="view_feedbacks">
                    <h2>View Feedbacks</h2>
                    <table id="feedbacksTable">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>email</th>
                                <th>feedback</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['feedback']; ?></td>
                                    </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            <?php
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>

</html>
