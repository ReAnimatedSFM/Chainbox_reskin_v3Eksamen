
<div class="createArticle container">

<h3 class="center errorMsg">Opret ny vare:</h3>

    <form action="./includes/insertArticle.php" method="post" enctype="multipart/form-data">

        <div>
            <label for="fileToUpload">Billede</label>
            <input type="file" id="fileToUpload" name="fileToUpload" placeholder="Vælg billede" required>
        </div>

        <div>
            <label for="product_imgalt">Alt tekst</label>
            <input type="text" id="product_imgalt" name="product_imgalt" placeholder="Billedets alttekst..." required>
        </div>

        <div>
            <label for="product_title">Overskrift</label>
            <input type="text" id="product_title" name="product_title" placeholder="Overskrift..." required>
        </div>

        <div>
            <label for="product_desc">Brødtekst</label>
            <textarea name="product_desc" id="product_desc" cols="30" rows="10" placeholder="Brødtekst..."></textarea>
        </div>

        <div>
            <label for="product_stars">Antal stjerner</label>
            <select name="product_stars" id="product_stars">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div>
            <label for="product_category">Kategori</label>
            <select name="product_category" id="product_category" required>
               <!-- <option value="jakker">Jakker</option>
                <option value="bukser">Bukser</option>
                <option value="sko">Sko</option>
                <option value="skjorter">Skjorter</option>
                <option value="strik">Strik</option>
                <option value="tshirts">T-shirts og tanktops</option>
                <option value="tasker">Tasker</option> -->
                <option value="cykel">Cykel</option>
                <option value="racercykel">Racercykel</option>
            </select>
        </div>

        <div>
            <input type="submit" value="Opret" name="submit">
        </div>
        
    </form>

</div>