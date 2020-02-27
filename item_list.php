<?php include './view/header.php'; ?>
<main>
        <section>
            <?php if( sizeof($items) != 0 ) { ?>
                <div id="table-overflow">
                    <table>
                        <thead>
                            <tr>
                                <th>ItemNum</th>
                                <th>Title</th>
                                <th colspan="2">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item) : ?>
                            <tr>
                                <td><?php echo $item['ItemNum']; ?></td>
                                <td><?php echo $item['Title']; ?></td>
                                <td><?php echo $item['Description']; ?></td>
                                <td><form action="delete_item.php" method="post">
                                    <input type="hidden" name="item_num"
                                        value="<?php echo $item['ItemNum']; ?>">
                                    <input type="submit" value="Remove" class="button red">
                                </form></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <p><a href="add_item_form.php">Click here</a> to add a new item to the list.</p>     
            <?php } else { ?>
                <p>No to do list items exist yet. <a href="?action=show_add_form">Click here</a> to add an item.</p>     
            <?php } ?>
            <br>
            <p><a href="category_list.php">View/Edit Categories</a></p>
        </section>
    </main>
    <?php include './view/footer.php'; ?>