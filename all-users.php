<?php
include "db.php";
include "partials/header.php";
include "partials/header-banner.php";
?>
<div class="w-50 p-5 m-5 m-auto">
    <table border="1">
        <h2>All Users List</h2>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>

            </tr>
        </thead>
        <?php
        $user_qry = "SELECT * FROM users";
        $res = mysqli_query($db_connection, $user_qry);
        $i = 1;
        while ($data = mysqli_fetch_assoc($res)) :
        ?>
        <tbody>

            <tr>
                <td> <?php echo $i++;  ?></td>
                <td> <?php echo $data['name']  ?></td>
                <td> <?php echo $data['email']  ?></td>
                <td> <?php echo $data['phone']  ?></td>
                <td> <?php echo $data['address']  ?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $data['user_id'] ?>"><span class="glyphicon glyphicon-pencil">
                            Edit
                        </span></a>
                </td>
                <td>
                    <a href="delete-user.phpid=<?php echo $data['user_id'] ?>"><span class="glyphicon glyphicon-trash">
                            Delete</span></a>
                </td>
            </tr>

            <?php
        endwhile
            ?>
        </tbody>
    </table>
</div>

<?php
include "partials/footer.php";
?>