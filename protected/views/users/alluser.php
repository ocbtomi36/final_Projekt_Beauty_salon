<h2>List of all users</h2>
<?php if(empty($rows)): ?>
    <p>There is no record to show</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <?php foreach($label as $value): ?>
                    <th><?=$value?></th>
                <?php endforeach; ?>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row):?>
                <tr>
                    <?php foreach($row as $item):?>
                      <td><?=$item?></td>
                    <?php endforeach; ?>
                    <td>
                        <a href="<?=BASE_URL?>start.php?U=users&A=detailsuser&P=<?=$row[4]?>" target="_blank">Deatils</a><br>
                        <a href="<?=BASE_URL?>start.php?U=users&A=modifyuser&P=<?=$row[4]?>" target="_blank">Modify</a><br>
                        <a href="<?=BASE_URL?>start.php?U=users&A=deleteuser&P=<?=$row[4]?>" target="_blank">Delete</a><br>
                    </td>
                    
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>    
<?php endif; ?>


