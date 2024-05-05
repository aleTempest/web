<a href="../public/index.php?controller=CareerController&action=create" class="btn btn-success">New</a>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Name</th>
        <th>Controls</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($careers as $career) {
        echo '<tr>';
        echo '<td>' . $career['career_name'] . '</td>';
        echo '<td>';
        echo '<a href="../public/index.php?controller=CareerController&action=update&id=' . $career['id_career'] . '" class="btn btn-primary">Edit</a> ';
        echo '<a href="../public/index.php?controller=CareerController&action=delete&id=' . $career['id_career'] . '" class="btn btn-danger">Delete</a>';
        echo '</td>';
        echo '<tr>';
    }
    ?>
    </tbody>
</table>
