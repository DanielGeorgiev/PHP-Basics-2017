<form>
    <div>
        Categories:<input type="text" name="categories"/>
    </div>
    <div>
        Tags:<input type="text" name="tags"/>
    </div>
    <div>
        Months:<input type="text" name="months"/>
    </div>
    <div>
        <input type="submit" name="generate" value="Generate"/>
    </div>
</form>

<?php if (isset($_GET['generate'])):
    $categories = explode(', ', $_GET['categories']);
    $tags = explode(', ', $_GET['tags']);
    $months = explode(', ', $_GET['months']);
?>
<h2>Categories</h2>
    <ul>
        <?php foreach ($categories as $category):
            echo "<li>$category</li>";
        endforeach; ?>
    </ul>
<h2>Tags</h2>
    <ul>
        <?php foreach ($tags as $tag):
            echo "<li>$tag</li>";
        endforeach; ?>
    </ul>
<h2>Months</h2>
    <ul>
        <?php foreach ($months as $month):
            echo "<li>$month</li>";
        endforeach; ?>
    </ul>
<?php endif; ?>

