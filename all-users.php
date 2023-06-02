<?php
include "db.php";
include "partials/header.php";
include "partials/header-banner.php";
?>
<div class="w-50  m-auto">
    <?php
    $mes = $_GET['message'] ?? '';
    ?>
    <div class="mes">
        <h1><?php echo $mes; ?></h1>
    </div>
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
        $record_per_page = 3;
        $page = '';
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $start_page = ($page - 1) * $record_per_page;
        $user_qry = "SELECT * FROM users LIMIT $start_page,$record_per_page";
        $res = mysqli_query($db_connection, $user_qry);
        $i = 1;
        while ($data = mysqli_fetch_assoc($res)) :
        ?>
        <tbody>

            <tr>
                <td> <?php echo $data['user_id'];  ?></td>
                <td> <?php echo $data['name']  ?></td>
                <td> <?php echo $data['email']  ?></td>
                <td> <?php echo $data['phone']  ?></td>
                <td> <?php echo $data['address']  ?></td>
                <td>
                    <a href="edit-user.php?id=<?php echo $data['user_id'] ?>"><span class="glyphicon glyphicon-pencil">
                            Edit
                        </span></a>
                </td>
                <td>
                    <a href="delete-user.php?id=<?php echo $data['user_id'] ?>"><span class="glyphicon glyphicon-trash">
                            Delete</span></a>
                </td>
            </tr>

            <?php
        endwhile
            ?>
        </tbody>
    </table>
    <div class="pagination">

        <?php
        $page_qry = "SELECT * FROM users ORDER BY user_id DESC";
        $page_res = mysqli_query($db_connection, $page_qry);
        $total_records = mysqli_num_rows($page_res);
        $total_pages = ceil($total_records / $record_per_page);
        for ($i = 1; $i < $total_pages; $i++) {
            echo "<a href='all-users.php?page=" . $i . "' >" . $i . "</a>";
        }
        ?>
    </div>
</div>

<?php
include "partials/footer.php";
?>