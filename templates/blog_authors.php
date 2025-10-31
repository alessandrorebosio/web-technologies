<header>
    <h2><?php echo $params["page_title"]; ?></h2>
</header>

<section>
    <table>
        <tr>
            <th id="author">Author</th>
            <th id="email">Email</th>
            <th id="topic">Topics</th>
        </tr>
        <?php foreach ($params["authors"] as $author): ?>
            <tr>
                <?php $rowId = getIdFromName($author["full_name"]); ?>
                <th id="<?php echo $rowId; ?>"><?php echo htmlspecialchars($author["full_name"]); ?></th>
                <td headers="<?php echo $rowId; ?> email"><?php echo htmlspecialchars($author["username"]); ?></td>
                <td headers="<?php echo $rowId; ?> topic"><?php echo htmlspecialchars($author["argument"]); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>