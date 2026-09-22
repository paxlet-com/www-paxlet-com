<?php
/**
 * Hero section
 * @var array $config
 */
?>
<section class="wrap hero">
  <div>
    <div class="eyebrow">Open source &middot; distributed &middot; connected</div>
    <h1>Build small.<br><span>Connect everything.</span></h1>
    <p class="lead"><?= htmlspecialchars($config['description']) ?></p>
    <div class="actions">
      <a class="btn primary" href="#start">Get started &rarr;</a>
      <a class="btn" href="<?= htmlspecialchars($config['github_repo']) ?>" target="_blank" rel="noopener">View on GitHub</a>
    </div>
  </div>
  <div class="visual">
    <img src="/assets/svg/network-pattern.svg" alt="Connected Paxlet capabilities">
  </div>
</section>
