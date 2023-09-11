
    <main>
        <article class="article-forms">
            <div class="forms">
                <form action="<?= BASE_URL.'start.php?U=upload'?>" method="POST" enctype="multipart/form-data">
                    <h1>File upload</h1>
                    <hr>
                    <div class="forms-wrap">
                        <div class="inputs">
                            <label for="upload">Select your file:</label>
                            <input type="file" id="upload" name="file">
                        </div>
                    </div>
                    <div class="submit-btn">
                        <input type="submit" name="submit" value="Send">
                    </div>
                </form>
            </div>
        </article>
    </main>