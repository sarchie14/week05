<?php include './view/header.php'; ?>

    <main>
    <h2>Category List</h2>
        <section>
                <div id="table-overflow">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category) : ?>
                            <tr>
                                <td><?php echo $category['categoryName']; ?></td>
                                <td><form action="delete_category.php" method="post">
                                    <input type="hidden" name="category_ID"
                                        value="<?php echo $item['categoryID']; ?>">
                                    <input type="submit" value="Remove" class="button red">
                                </form></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <h2>Add Category</h2>
        <form action="index.php" method="post" id="add_item_form">
        <input type="hidden" name="action" value="add_category">
            <label>Name:</label>
            <input type="text" name="categoryName" max="20" required><br>

            <input type="submit" value="Add Category" class="button blue"><br>
        </form>
        <p><a href="index.php">View To Do List</a></p>
        </section>

    </main>
    <?php include './view/footer.php'; ?>