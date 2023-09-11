
<main>
        <article class="article-forms">
            <div class="forms">
                <form action="<?=BASE_URL?>?U=usersdatabase&A=addfinaluserdb" method="POST" accept-charset="UTF-8">
                    <h1>Registration</h1>
                    <hr>
                    <div class="forms-wrap">
                        <div class="inputs">
                            <label for="firstname">Firstname</label>
                            <input type="text" name="firstname" id="firstname" required="required">
                        </div>
                        <div class="inputs">
                            <label for="firstname2nd">Firstname*</label>
                            <input type="text"name="firstname2nd" id="firstname2nd">
                        </div>
                        <div class="inputs">
                            <label for="lastname">Lastname</label>
                            <input type="text" name="lastname" id="lastname" required="required">
                        </div>
                        <div class="inputs">
                            <label for="lastname">Lastname*</label>
                            <input type="text"name="lastname2nd" id="lastname2nd">
                        </div>
                        <div class="inputs">
                            <label for="idnumber">Id Number</label>
                            <input type="text" name="idnumber" id="idnumber" minlength="8" maxlength="8" required="required" >
                        </div>
                        <div class="inputs">
                            <label for="dateofbirth">Date of Birth</label>
                            <input type="date" name="dateofbirth" id="dateofbirth" required="required" >
                        </div>
                        <div class="inputs">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password"  minlength="8" maxlength="16" required="required" >
                        </div>
                        <div class="inputs">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                        <div class="inputs">
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" name="phonenumber">
                        </div>
                        <div class="inputs">
                            <label for="role">Plese Choose Role</label>
                            <select name="role" id="role">
                                <option value="1">Admin</option>
                                <option value="2">Manager</option>
                                <option value="3">Employee</option>
                                <option value="4">User</option>
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