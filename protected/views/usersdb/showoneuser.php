<main>
<div class="list_all_users">
    <h2>List of Users</h2>

    <?php if($result === NULL || empty($result)):?>

    <p>There is nothing in DB.</p>
    <?php else: ?>

    <table>
        <thead>
            <tr>
                <th class="one_user">Id</th>
                <th class="one_user">First Name</th>
                <th class="one_user">First Name 2nd</th>
                <th class="one_user">Last Name</th>
                <th class="one_user">Last Name 2nd</th>
                <th class="one_user">Id Card Number</th>
                <th class="one_user">Date of Birth</th>
                <th class="one_user">User Role</th>
                <th class="one_user">Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row):?>
                <tr>
                    <td class="one_user"><?=$row['iduser']?></td>
                    <td class="one_user"><?=$row['first_name']?></td>
                    <td class="one_user"><?=$row['first_name2nd']?></td>
                    <td class="one_user"><?=$row['last_name']?></td>
                    <td class="one_user"><?=$row['last_name2nd']?></td>
                    <td class="one_user"><?=$row['id_card_number']?></td>
                    <td class="one_user"><?=$row['date_of_birth']?></td>
                    <td class="one_user"><?=$row['user_role']?></td>
                    <td class="one_user"><a href="<?=BASE_URL?>?U=usersdatabase&A=finaloneuserdb&P=<?=$row['iduser']?>">Show One User</a></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    </div>
    <div class="spacing">
    </div>
<?php endif;?>