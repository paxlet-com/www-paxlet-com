<?php
/**
 * Navigation component
 * @var array $config
 */
?>
<header class="wrap">
  <nav class="nav">
    <a href="/" aria-label="Paxlet Home">
      <img src="/assets/svg/paxlet-logo.svg" alt="Paxlet">
    </a>
    <div class="navlinks">
      <a href="#how">How it works</a>
      <a href="#people">For people</a>
      <a href="<?= htmlspecialchars($config['pypi_url']) ?>" target="_blank" rel="noopener">PyPI</a>
      <a href="<?= htmlspecialchars($config['github_org']) ?>" target="_blank" rel="noopener">GitHub</a>
      <a class="btn primary" href="#start">Get started &rarr;</a>
    </div>
  </nav>
</header>
