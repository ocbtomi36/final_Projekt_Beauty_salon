

<main>
        <article class="article-forms">
            <div class="forms">
                <form action="#" method="post" accept-charset="UTF-8">
                    <h1>Registration</h1>
                    <hr>
                    <div class="forms-wrap">
                        <div class="inputs">
                            <label for="firstname">Firstname</label>
                            <input type="text" name="firstname" id="firstname" placeholder="Enter your Firstname" required="required">
                        </div>
                        <div class="inputs">
                            <label for="firstname2nd">Firstname*</label>
                            <input type="text"name="firstname2nd" id="firstname2nd"  placeholder="Enter your 2nd Firstname">
                        </div>
                        <div class="inputs">
                            <label for="lastname">Lastname</label>
                            <input type="text" name="lastname" id="lastname" placeholder="Enter your Firstname" required="required">
                        </div>
                        <div class="inputs">
                            <label for="lastname">Lastname*</label>
                            <input type="text"name="lastname2nd" id="lastname2nd"  placeholder="Enter your 2nd Lastname">
                        </div>
                        <div class="inputs">
                            <label for="idnumber">Id Number</label>
                            <input type="text" name="idnumber" id="idnumber" placeholder="Enter your Id Number" minlength="8" maxlength="8" required="required" >
                        </div>
                        <div class="inputs">
                            <label for="dateofbirth">Date of Birth</label>
                            <input type="date" name="dateofbirth" id="firstname" placeholder=""required="required" >
                        </div>
                        <div class="inputs">
                            <label for="placeofbirth">Place of Birth</label>
                            <input type="text" name="placeofbirth" id="firstname" placeholder="Enter your Place of Birth" required="required">
                        </div>
                        <div class="inputs">
                            <label for="email">E-mail</label>
                            <input type="text"name="email" id="email"  placeholder="Enter your E-mail Address">
                        </div>
                        <div class="inputs">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" placeholder="Enter your Password" minlength="8" maxlength="16" required="required" >
                        </div>
                        <div class="inputs">
                            <label for="sex">Sex</label>
                            <select name="sex" id="sex">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                        <div class="inputs">
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" name="phonenumber" placeholder="Enter your Phone number">
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
                    <h1>Enter your Address</h1>
                    <hr>
                    <div class="forms-wrap">
                        <div class="inputs">
                            <label for="city">City</label>
                            <input type="text" name="city"id="city" placeholder="Enter your Name of City" required="required">
                        </div>
                        <div class="inputs">
                            <label for="zipcode">Zip Code</label>
                            <input type="text" name="zipcode" id="zipcode" placeholder="Enter your Zipcode" required="required">
                        </div>
                        <div class="inputs">
                            <label for="street">Street</label>
                            <input type="text" name="street" id="street" placeholder="Enter your Name of Street" required="required">
                        </div>
                        <div class="inputs">
                            <label for="housenumber">House Number</label>
                            <input type="text" name="housenumber" id="housenumber" placeholder="Enter your House Number">
                        </div>
                    </div>
                    <div class="submit-btn">
                        <input type="submit" name="send" value="send">
                    </div>
                </form>
            </div>
        </article>
