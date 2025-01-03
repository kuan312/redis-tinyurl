<?php require __DIR__ . '/partials/layout_start.php'; ?>
<?php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
?>

<h2>Admin-panel: links list</h2>

<?php if (!empty($allLinks)): ?>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Hashed url</th>
                <th>Full url</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allLinks as $short => $long): ?>
                <tr>
                    <td><?php echo $protocol . "://" . $_SERVER['HTTP_HOST'] . "/s/" . htmlspecialchars($short); ?></td>
                    <td><a href="<?php echo htmlspecialchars($long); ?>" target="_blank"><?php echo htmlspecialchars($long); ?></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>The hash "links" is empty</p>
<?php endif; ?>

<hr>

<form method="POST" action="/admin/flush-links" onsubmit="return confirm('Сlear only short links?');">
    <button type="submit">Clear links (del "links")</button>
</form>

<br>

<form method="POST" action="/admin/flush-all" onsubmit="return confirm('Warning! Delete everything in Redis?');">
    <button type="submit">Complete clear Redis (flushAll)</button>
</form>

<?php require __DIR__ . '/partials/layout_end.php'; ?>
