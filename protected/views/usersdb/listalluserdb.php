<div class="list_all_users">
    <h2>List of Users</h2>

    <?php if($result === NULL || empty($result)):?>

    <p>There is nothing in DB.</p>
    <?php else: ?>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>First Name 2nd</th>
                <th>Last Name</th>
                <th>Last Name 2nd</th>
                <th>Id Card Number</th>
                <th>Date of Birth</th>
                <th>User Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row):?>
                <tr>
                    <td><?=$row['iduser']?></td>
                    <td><?=$row['first_name']?></td>
                    <td><?=$row['first_name2nd']?></td>
                    <td><?=$row['last_name']?></td>
                    <td><?=$row['last_name2nd']?></td>
                    <td><?=$row['id_card_number']?></td>
                    <td><?=$row['date_of_birth']?></td>
                    <td><?=$row['user_role']?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<div class="spacing">
</div>
<?php endif;?>