<div class="createArticle container">

<h3 class="center errorMsg">Opret ny slide:</h3>

    <form action="./includes/registerSlide/insertSlide.php" method="post" enctype="multipart/form-data">

        <div>
            <label for="fileToUpload">Billede</label>
            <input type="file" id="fileToUpload" name="fileToUpload" placeholder="Vælg billede" required>
        </div>

        <div>
            <label for="slide_alt">Billede beskrivelse</label>
            <input type="text" id="slide_alt" name="slide_alt" placeholder="" required>
        </div>

        <div>
            <input type="submit" value="Opret" name="submit">
        </div>
        
    </form>

</div>