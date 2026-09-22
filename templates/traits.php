<?php
/**
 * Traits section
 */
$traits = [
    ['title' => 'Small', 'desc' => 'One capability at a time.'],
    ['title' => 'Addressable', 'desc' => 'Identity and location stay explicit.'],
    ['title' => 'Verifiable', 'desc' => 'Contracts, policy and provenance.'],
    ['title' => 'Connected', 'desc' => 'Grow from one node into a network.'],
];
?>
<section class="wrap traits">
  <?php foreach ($traits as $trait): ?>
    <div class="trait">
      <b><?= htmlspecialchars($trait['title']) ?></b>
      <span><?= htmlspecialchars($trait['desc']) ?></span>
    </div>
  <?php endforeach; ?>
</section>
