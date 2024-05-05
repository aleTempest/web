<table class="table table-hover">
    <thead>
    <tr>
        <th>Enrollment</th>
        <th>Username</th>
        <th>Password</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Birth</th>
        <th>Type</th>
        <th>Controls</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($users as $user) {
        echo '<tr>';
        echo '<td>' . $user['enrollment'] . '</td>';
        echo '<td>' . $user['username'] . '</td>';
        echo '<td>' . $user['password'] . '</td>';
        echo '<td>' . $user['phone_number'] . '</td>';
        echo '<td>' . $user['email'] . '</td>';
        echo '<td>' . $user['birth'] . '</td>';
        echo '<td>' . $user['type'] . '</td>';
        echo '<td>';
        echo '<a href="../public/index.php?controller=UserController&action=update&id=' . $user['id_user'] . '" class="btn btn-primary">Edit</a> ';
        echo '<a href="../public/index.php?controller=UserController&action=delete&id=' . $user['id_user'] . '" class="btn btn-danger">Delete</a> ';
        echo '</td>';
        echo '<tr>';
    }
    ?>
    </tbody>
</table>