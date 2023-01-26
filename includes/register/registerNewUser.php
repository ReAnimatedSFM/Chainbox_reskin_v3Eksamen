
<div class="createArticle container">

<h3 class="center errorMsg">Opret ny bruger:</h3>

    <form action="./includes/register/insertUser.php" method="post" enctype="multipart/form-data">

        <div>
            <label for="fileToUpload">Profilbillede</label>
            <input type="file" id="fileToUpload" name="fileToUpload" placeholder="Vælg billede" required>
        </div>

        <div>
            <label for="user_name">Brugernavn</label>
            <input type="text" id="user_name" name="user_name" placeholder="" required>
        </div>

        <div>
            <label for="password1">Adgangskode</label>
            <input type="password" name="password1" id="password1" placeholder="" required>
        </div>

        <div>
            <label for="password2">Gentag kode</label>
            <input type="password" name="password2" id="password2" placeholder="" required>
        </div>

        <div>
            <input type="submit" value="Opret bruger" name="submit">
        </div>
        
    </form>

</div>