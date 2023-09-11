<?php

if(!filter_has_var(INPUT_GET,'P')){
    die('Wrong Parameter');
}
$id = filter_input(INPUT_GET,'P',FILTER_VALIDATE_INT);
if($id === FALSE){
    die('Wrong Parameter');
}
if(empty($result)){
    header('Location: http://localhost/Projekt_Beauty_Salon_Php/start.php');
}
?>
<main>
        <article class="article-forms">
            <div class="forms">
                <form action="<?=BASE_URL?>?U=usersdatabase&A=updateuser" method="post" accept-charset="UTF-8">
                    <h1>Update User Form</h1>
                    <hr>
                    <div class="forms-wrap">
                        <div>
                            <input type="text" name="iduser" id="iduser" value="<?=$id?>" hidden>                        
                        </div>
                        <div class="inputs">
                            <label for="firstname">Firstname</label>
                            <input type="text" name="firstname" id="firstname" value="<?=$result['first_name']?>" required="required">
                        </div>
                        <div class="inputs">
                            <label for="firstname2nd">Firstname*</label>
                            <input type="text"name="firstname2nd" id="firstname2nd" value="<?=$result['first_name2nd']?>">
                        </div>
                        <div class="inputs">
                            <label for="lastname">Lastname</label>
                            <input type="text" name="lastname" id="lastname" value="<?=$result['last_name']?>" required="required">
                        </div>
                        <div class="inputs">
                            <label for="lastname">Lastname*</label>
                            <input type="text"name="lastname2nd" id="lastname2nd"  value="<?=$result['last_name2nd']?>">
                        </div>
                        <div class="inputs">
                            <label for="idnumber">Id Number</label>
                            <input type="text" name="idnumber" id="idnumber" value="<?=$result['id_card_number']?>" minlength="8" maxlength="8" required="required" >
                        </div>
                        <div class="inputs">
                            <label for="dateofbirth">Date of Birth</label>
                            <input type="date" name="dateofbirth" id="dateofbirth" value="<?=substr($result['date_of_birth'],0,10)?>" required="required" >
                        </div>
                        <div class="inputs">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" value="<?=$result['password']?>"  minlength="8" maxlength="16" required="required" >
                        </div>
                        <div class="inputs">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender">
                                <option value="1" <?php if($result['gender'] == 'male') echo 'selected'; ?> >Male</option>
                                <option value="2" <?php if($result['gender'] == 'female') echo 'selected'; ?> >Female</option>
                            </select>
                        </div>
                        <div class="inputs">
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" name="phonenumber" value="<?=$result['phone_number']?>">
                        </div>
                        <div class="inputs">
                            <label for="role">Plese Choose Role</label>
                            <select name="role" id="role">
                                <option value="admin" <?php if($result['user_role'] == 'admin') echo 'selected'; ?>>Admin</option>
                                <option value="manager" <?php if($result['user_role'] == 'manager') echo 'selected'; ?>>Manager</option>
                                <option value="employee" <?php if($result['user_role'] == 'employee') echo 'selected'; ?>>Employee</option>
                                <option value="user" <?php if($result['user_role'] == 'user') echo 'selected'; ?>>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="submit-btn">
                        <input type="submit" name="send" value="send">
                    </div>
                </form>
            </div>
        </article>
        <div class="spacing">

        </div>