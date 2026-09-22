<?php
/**
 * Footer template
 * @var array $config
 */
?>
<footer class="wrap footer">
  <span>&copy; <?= htmlspecialchars($config['year']) ?> <?= htmlspecialchars($config['app_name']) ?> (v<?= htmlspecialchars($config['version']) ?>)</span>
  <span>
    <a href="https://<?= htmlspecialchars($config['domain']) ?>"><?= htmlspecialchars($config['domain']) ?></a> &middot;
    <a href="<?= htmlspecialchars($config['github_org']) ?>" target="_blank" rel="noopener">github.com/paxlet-com</a>
  </span>
</footer>
</body>
</html>
